<?php
require_once "../conexao.php";
session_start();

$cpf            =$_SESSION['cpf'];

$telefone = $_POST['telefone'];
$nome = $_POST['nome'];
$email = $_POST['email'];

// validar os dados de entrada
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

// preparar a consulta com parâmetros de consulta preparados
$sql = "UPDATE cliente SET telefone=?, nome=?, email=? WHERE cpf=?";
$stmt = mysqli_prepare($conexao, $sql);

// vincular os parâmetros de consulta
mysqli_stmt_bind_param($stmt, "sssi", $telefone, $nome, $email, $cpf);

// executar a consulta
if (mysqli_stmt_execute($stmt)) {
    $_SESSION['alteracao_dados_cliente'] = "sucesso";
} else {
    $_SESSION['alteracao_dados_cliente'] = "erro";
}

var_dump($_SESSION['alteracao_dados_cliente']);
// fechar a conexão e liberar os recursos
mysqli_stmt_close($stmt);
mysqli_close($conexao);

// redirecionar de volta para a página anterior
header("Location: perfil_cliente.php");
exit;
?>