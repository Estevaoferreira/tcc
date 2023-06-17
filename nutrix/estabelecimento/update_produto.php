<?php
require_once "../conexao.php";
session_start();


/*Definição das váriaveis*/
$codProduto = $_GET['cod'];
$cnpj = $_SESSION['cnpj'];
// Verificar se as variáveis estão definidas
$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$categoria_produto = isset($_POST['categoria_produto']) ? $_POST['categoria_produto'] : array();
$ingredientes = isset($_POST['ingredientes']) ? $_POST['ingredientes'] : array();
$categorias_cliente = isset($_POST['categoria_cliente']) ? $_POST['categoria_cliente'] : array();
$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : '';
$valor = isset($_POST['valor']) ? $_POST['valor'] : '';
$composicao = isset($_POST['composicao']) ? $_POST['composicao'] : '';




if (isset($_POST['ofoto'])) {
	$caminho_arquivo = $_POST['foto'];
	//echo '<br>'.$nome,  '<br>'.$descricao, '<br>'.$valor, '<br>'.$composicao, '<br>'.$cnpj, '<br>'.$foto.'<br>';
}else{
$destino = 'imagens_produto/'; // Pasta de destino
$nome_arquivo = uniqid() . '_' . $_FILES['foto']['name']; // Nome do arquivo com prefixo único
$caminho_arquivo = $destino . $nome_arquivo;
if (move_uploaded_file($_FILES['foto']['tmp_name'], $caminho_arquivo)) {} else {}
	/*echo '<br>'.$nome,  '<br>'.$descricao, '<br>'.$valor, '<br>'.$composicao, '<br>'.$cnpj, '<br>'.$destino, $nome_arquivo, $caminho_arquivo.'<br>';*/
}
/*echo "<br>";
foreach ($categoria_produto as $value) {
		echo " COD Categoria do Produto -> [".$value."]";
}
echo "<br>";
foreach ($ingredientes as $value) {
		echo " Nome do ingrediente -> [".$value."]";
}
echo "<br>";
foreach ($categorias_cliente as $value) {
		echo " COD Categoria do Produto -> [".$value."]";
}*/


/*------------------------------INICIO UPDATE TABELA PRODUTOS---------------------------------------------------*/

$sql = $conexao->query("UPDATE produto SET 
						nome='$nome',
						foto='$caminho_arquivo',
						descricao='$descricao',
						valor='$valor',
						compo='$composicao' WHERE cod='$codProduto'");

/*------------------------------FINAL  UPDATE TABELA PRODUTOS---------------------------------------------------*/







/*------------------------------INICIO UPDATE TABELA PRODUTO-CATEGORIA------------------------------------------*/
/*------------------------------FINAL  UPDATE TABELA PRODUTO-CATEGORIA------------------------------------------*/




/*------------------------------INICIO UPDATE TABELA PRODUTO-INGREDIENTE----------------------------------------*/
/*------------------------------FINAL  UPDATE TABELA PRODUTO-INGREDIENTE----------------------------------------*/




/*------------------------------INICIO UPDATE TABELA PRODUTO-PUBLICO--------------------------------------------*/
/*------------------------------FINAL  UPDATE TABELA PRODUTO-PUBLICO--------------------------------------------*/

?>
