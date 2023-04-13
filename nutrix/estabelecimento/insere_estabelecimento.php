<?php
// estabelece a conexão com o banco de dados
require_once "../conexao.php";

// obtém os valores do CPF, nome, telefone, e-mail e senha do formulário
echo $cnpj            = $_POST["cnpj"];
$nome           = $_POST["nome"];
$telefone       = $_POST["telefone"];
$email          = $_POST["email"];
$senha          = $_POST['senha'];
$estado         = $_POST["estado"];
$cidade         = $_POST['cidade'];
$bairro         = $_POST['bairro'];
$logradouro     = $_POST['logradouro'];
$cep            = $_POST['cep'];
$numero         = $_POST['numero'];
$complemento    = $_POST['complemento'];

// Gera um hash seguro para a senha
$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

// cria a instrução SQL INSERT
// Insere um novo registro na tabela "cliente"
$sql = "INSERT INTO estabelecimento (cnpj, nome, telefone, email, senha, estado, cidade, bairro, logradouro, cep, numero, complemento) 
VALUES ('$cnpj', '$nome', '$telefone', '$email', '$senha_hash', '$estado', '$cidade', '$bairro', '$logradouro', '$cep', '$numero', '$complemento')";

if (mysqli_query($conexao, $sql)) {
    echo "Novo cliente adicionado com sucesso!";
    header("Location: dashboard_estabelecimento.php");
} else {
    echo "Erro ao adicionar novo cliente: " . mysqli_error($conexao);
}

// Fecha a conexão com o banco de dados
mysqli_close($conexao);
?>
