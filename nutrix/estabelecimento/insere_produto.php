<?php 
require_once "../conexao.php";
session_start();
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
	header("Location: entre_business.php");exit();
} 

$nome = $_POST['nome'];
$categorias = $_POST['categorias'];
$foto = $_POST['foto'];
$descicao_produto = $_POST['desc-prod'];
$valor = $_POST['valor'];
$cnpj = $_SESSION['cnpj'];

echo '<br>'.$nome, '<br>'.$foto, '<br>'.$descicao_produto, '<br>'.$valor, '<br>'.$cnpj;

echo '<br>';

var_dump($categorias);


/*Primeiamente será feita a inserção dos dados do produto na tabela produto linkado com o CNPJ do estabelecimento que está fazendo a inserção de produto*/

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$categorias = filter_input(INPUT_POST, 'categorias', FILTER_SANITIZE_STRING);
$foto = filter_input(INPUT_POST, 'foto', FILTER_SANITIZE_STRING);
$descicao_produto = filter_input(INPUT_POST, 'descicao_produto', FILTER_SANITIZE_STRING);
$valor = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_STRING);

// Preparar a consulta com parâmetros de consulta preparados
$sql = "INSERT INTO produto (nome, foto, descricao, valor, cnpj_estabelecimento) 
        VALUES (?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conexao, $sql);

if ($stmt === false) {
    die('Erro na preparação da consulta: ' . mysqli_error($conexao));
}

// Vincular os parâmetros de consulta
mysqli_stmt_bind_param($stmt, "sssss", $nome, $foto, $descricao_produto, $valor, $cnpj);

// Executar a consulta
if (mysqli_stmt_execute($stmt)) {
    $_SESSION['insercao_produto'] = "sucesso";
} else {
    $_SESSION['insercao_produto'] = "erro: " . mysqli_error($conexao);
}

/*foreach ($categorias as $categoria) {
    $stmt = $conn->prepare("INSERT INTO produto_categoria (cod_produto, cod_categoria) VALUES () ;
    $stmt->bind_param("ii", $cod_produto, $cod_categoria);

    /*Supondo que você tenha o código do produto e o código da categoria disponíveis
    $cod_produto = $codigo_produto;
    $cod_categoria = $categoria;

    $stmt->execute();
    $stmt->close();
  }*/
?>