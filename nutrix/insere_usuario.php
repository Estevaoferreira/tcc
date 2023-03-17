<?php
// estabelece a conexão com o banco de dados
$servername = "localhost";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "seu_banco_de_dados";

$conn = new mysqli($servername, $username, $password, $dbname);

// verifica se a conexão foi bem sucedida
if ($conn->connect_error) {
  die("Conexão falhou: " . $conn->connect_error);
}

// obtém os valores do CPF, nome, telefone, e-mail e senha do formulário
$cpf = $_POST["cpf"];
$nome = $_POST["nome"];
$telefone = $_POST["telefone"];
$email = $_POST["email"];
$senha = $_POST["senha"];

// cria a instrução SQL INSERT
$sql = "INSERT INTO clientes (cpf, nome, telefone, email, senha)
VALUES ('$cpf', '$nome', '$telefone', '$email', '$senha')";

// executa a instrução SQL
if ($conn->query($sql) === TRUE) {
  echo "Dados inseridos com sucesso.";
} else {
  echo "Erro ao inserir dados: " . $conn->error;
}

// fecha a conexão com o banco de dados
$conn->close();
?>
