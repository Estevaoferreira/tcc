<?php
// Conexão com o banco de dados
require_once "conexao.php";

if ($conexao->connect_error) {
    die("Connection failed: " . $conexao->connect_error);
}

// Recupera os dados do formulário
$username = $_POST["username"];
$message = $_POST["message"];
$date = date('d-m-Y H:i:s');

// Insere a mensagem na tabela do banco de dados
$sql = "INSERT INTO chat (username, message, date) VALUES ('$username', '$message', '$date')";

if ($conexao->query($sql) === TRUE) {
    // Redireciona o usuário de volta para a página do chat
    header("Location: chat.php");
    exit;
} else {
    echo "Erro ao enviar a mensagem: " . $conexao->error;
}

$conexao->close();
?>
