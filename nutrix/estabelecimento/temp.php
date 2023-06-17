<?php
require_once "../conexao.php";

<?php 
require_once "../conexao.php";
session_start();


/*Definição das váriaveis*/
$nome = $_POST['nome'];
$categoria_produto = $_POST['categoria_produto'];                 //Array de categorias que será tratado diferente
$ingredientes = $_POST['ingredientes'];             //Array de ingredientes que será tratado diferente
$categorias_cliente = $_POST['categoria_cliente']; //Array de categorias dos clientes que será tratado diferente
$descricao = $_POST['descricao'];
$valor = $_POST['valor'];
$composicao = $_POST['cmoposicao'];
$cnpj = $_SESSION['cnpj'];
$destino = 'imagens_produto/'; // Pasta de destino
$nome_arquivo = uniqid() . '_' . $_FILES['foto']['name']; // Nome do arquivo com prefixo único
$caminho_arquivo = $destino . $nome_arquivo;
if (move_uploaded_file($_FILES['foto']['tmp_name'], $caminho_arquivo)) {} else {}



echo '<br>'.$nome, '<br>'.$categoria_produto, '<br>'.$ingredientes, '<br>'.$categorias_cliente, '<br>'.$descricao, '<br>'.$valor, '<br>'.$composicao, '<br>'.$cnpj, '<br>'.$destino, $nome_arquivo, $caminho_arquivo;



/*--------------------------Inicio da inserção do produto na tabela produtos*/

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$categorias = filter_input(INPUT_POST, 'categorias', FILTER_SANITIZE_STRING);
$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
$valor = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_STRING);

    // Preparar a consulta com parâmetros de consulta preparados
$sql = "INSERT INTO produto (nome, foto, descricao, valor, cnpj_estabelecimento) 
VALUES (?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conexao, $sql);

if ($stmt === false) {
    die('Erro na preparação da consulta: ' . mysqli_error($conexao));
}

    // Vincular os parâmetros de consulta
mysqli_stmt_bind_param($stmt, "sssss", $nome, $caminho_arquivo, $descricao, $valor, $cnpj);

    // Executar a consulta
if (mysqli_stmt_execute($stmt)) {$_SESSION['insercao_produto'] = "sucesso";} else {$_SESSION['insercao_produto'] = "erro: " . mysqli_error($conexao);}

/*--------------------------Final da inserção do produto na tabela produtos*/




/*--------------------------Inicio da inserção das categorias com relação com o produto na tabela produto_categorias*/

// Array com os valores dinâmicos
$categorias = $_POST['categorias'];


/*Fazer a pesquisa na tabela produto pra paegar o código do último produto inserido*/
$sql = "SELECT * FROM produto WHERE cnpj_estabelecimento = '$cnpj' ORDER BY cod DESC LIMIT 1";
$result = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $cod_produto_inserido = $row['cod'];
}


echo "<br> O codigo: ".$cod_produto_inserido;

// Conectar ao banco de dados
require_once "../conexao.php";

// Verificar a conexão
if (!$conexao) {
    die('Erro ao conectar ao banco de dados: ' . mysqli_connect_error());
}

// Loop para inserir os valores do array na tabela produto_categoria
foreach ($categorias as $valor) {
    // Instrução de inserção
    $sql = "INSERT INTO produto_categoria (cod_produto, cod_categoria) VALUES ('$cod_produto_inserido', '$valor')";

    // Executar a instrução de inserção
    mysqli_query($conexao, $sql);
}

foreach ($categorias_cliente as $valor) {
    // Instrução de inserção
    $sql = "INSERT INTO produto_publico (cod_produto, cod_categoria) VALUES ('$cod_produto_inserido', '$valor')";

    // Executar a instrução de inserção
    mysqli_query($conexao, $sql);
}
/*--------------------------Final da inserção das categorias com relação com o produto na tabela produto_categorias*/



/*--------------------------Inicio da inserção dos ingredientes sem relação com o produto na tabela ingrdientes*/
$sqlExistente = "SELECT nome FROM ingrediente";
$resultExistente = mysqli_query($conexao, $sqlExistente);

$ingrediente_existe = array();
while ($row = mysqli_fetch_assoc($resultExistente)) {
    $ingrediente_existe[] = $row['nome'];
}

var_dump($ingrediente_existe);

$ingrediente_novo = array();

foreach ($ingredientes as $ingrediente) {
    $ingredienteFormatado = ucfirst(strtolower(trim($ingrediente)));
    if (!in_array($ingredienteFormatado, $ingrediente_existe)) {
        $ingrediente_novo[] = $ingredienteFormatado;
    }
}

if (!empty($ingrediente_novo)) {
    $sqlInsercao = "INSERT INTO ingrediente (nome) VALUES ";
    foreach ($ingrediente_novo as $ingrediente) {
        $sqlInsercao .= "('" . mysqli_real_escape_string($conexao, $ingrediente) . "'),";
    }
    $sqlInsercao = rtrim($sqlInsercao, ",");

    if (mysqli_query($conexao, $sqlInsercao)) {
        echo "Ingredientes adicionados com sucesso!";
    } else {
        echo "Erro ao adicionar os ingredientes: " . mysqli_error($conexao);
    }
} else {
    echo "Todos os ingredientes já existem na tabela.";
}




/*--------------------------Final da inserção dos igredientes sem relação com o produto na tabela ingrdientes*/



/*--------------------------Inicio da busca pelo codigo dos ingredientes adicionados ou usados no produto atual*/

$ingredientes = $_POST['ingredientes']; // Array com os nomes dos ingredientes

// Preparação da consulta SQL
$ingredientes_str = "'" . implode("', '", $ingredientes) . "'";
$sql = "SELECT cod, nome FROM ingrediente WHERE nome IN ($ingredientes_str)";
$resultado = mysqli_query($conexao, $sql);

// Armazenamento dos códigos em um array associativo com o nome como chave
$ingredientes_cod = array();
while ($row = mysqli_fetch_assoc($resultado)) {
    $cod = $row['cod'];
    $nome = $row['nome'];
    $ingredientes_cod[$nome] = $cod;
}

// Exemplo de uso dos códigos dos ingredientes
foreach ($ingredientes_cod as $nome => $cod) {
    echo "<br>O código do ingrediente '$nome' é: $cod<br>";

    $sql = "SELECT * FROM produto_ingrediente WHERE cod_ingrediente =".$cod;
    $result = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "Retornou $cod<br>";
    } else {
        $sqlInsercao = "INSERT INTO produto_ingrediente (cod_produto, cod_ingrediente) VALUES ($cod_produto_inserido, $cod)";
        if (mysqli_query($conexao, $sqlInsercao)) {
            echo "Inserido na tabela produto_ingrediente: $cod<br>";
        } else {
            echo "Erro ao inserir na tabela produto_ingrediente: " . mysqli_error($conexao);
        }
    }


}

/*--------------------------Final da busca pelo codigo dos ingredientes adicionados ou usados no produto atual*/


/*--------------------------Inicio da inserção dos ingredientes do produto na tabela produto_ingrdientes*/

/*--------------------------Final da inserção dos ingredientes do produto na tabela produto_ingrdientes*/
// Fechar a conexão
mysqli_close($conexao);

header("Location: produtos.php");
?>
