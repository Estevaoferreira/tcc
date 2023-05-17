<?php
require_once "../conexao.php";
session_start();

$cnpj            =$_SESSION['cnpj'];

$telefone = $_POST['telefone'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$estado = $_POST['estado'];
$cidade = $_POST['cidade'];
$bairro = $_POST['bairro'];
$logradouro = $_POST['logradouro'];
$cep = $_POST['cep'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];

// validar os dados de entrada
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
$bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
$logradouro = filter_input(INPUT_POST, 'logradouro', FILTER_SANITIZE_STRING);
$cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
$numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
$complemento = filter_input(INPUT_POST, 'complemento', FILTER_SANITIZE_STRING);
// preparar a consulta com parâmetros de consulta preparados
$sql = "UPDATE cliente SET telefone=?, nome=?, email=?, estado=?, cidade=?, bairro=?, logradouro=?, cep=?, numero=?, complemento=? WHERE cnpj=?";
$stmt = mysqli_prepare($conexao, $sql);

// vincular os parâmetros de consulta
mysqli_stmt_bind_param($stmt, "sssi", $telefone, $nome, $email,$estado, $cidade, $bairro, $logradouro, $cep, $numero, $complemento, $cnpj);

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
header("Location: perfil_Estabelecimento.php");
exit;
?>