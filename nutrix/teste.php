<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "nutrix";

// Conexão com o banco de dados
$conn = new mysqli($host, $username, $password, $database);

// Verificação da conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Verificação de acesso às tabelas
$tables = array("chat", "produto", "favorito", "cliente", "categoria", "estabelecimento");
foreach ($tables as $table) {
    $query = "SELECT 1 FROM $table LIMIT 1";
    $result = $conn->query($query);
    if (!$result) {
        die("Erro ao acessar a tabela $table: " . $conn->error);
    }
}

echo "Conexão bem-sucedida e acesso às tabelas verificado com sucesso.";

$conn->close();

?>
