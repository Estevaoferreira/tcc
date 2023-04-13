<?php
// estabelece a conexão com o banco de dados
require_once "../conexao.php";

// obtém os valores do CPF, nome, telefone, e-mail e senha do formulário
$cpf = $_POST["cpf"];
$nome = $_POST["nome"];
$telefone = $_POST["telefone"];
$email = $_POST["email"];
$senha = $_POST["senha"];

// Gera um hash seguro para a senha
$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

// cria a instrução SQL INSERT
// Insere um novo registro na tabela "cliente"
$sql = "INSERT INTO cliente (cpf, nome, telefone, email, senha) 
VALUES ('$cpf', '$nome', '$telefone', '$email', '$senha_hash')";

if (mysqli_query($conexao, $sql)) {
    echo "Novo cliente adicionado com sucesso!";
    header("Location: dashboard.php");
} else {
    echo "Erro ao adicionar novo cliente: " . mysqli_error($conexao);
}

// Fecha a conexão com o banco de dados
mysqli_close($conexao);
?>
