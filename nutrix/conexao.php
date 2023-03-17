<?php
// Dados de conexão
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "nutrix";

// Cria a conexão
$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

// Verifica se a conexão foi estabelecida corretamente
if (!$conexao) {
    die("Conexão falhou: " . mysqli_connect_error());
}
?>
