<?php
require_once "../conexao.php";
session_start();

$codProduto = $_GET['cod'];
$cnpjEstabelecimento = $_SESSION['cnpj'];
$caminho_arquivo = "";
$sql = $conexao->query("UPDATE produto SET foto = '$caminho_arquivo' WHERE cod='$codProduto'");

$conexao->close();
header("Location: alterar_produto.php?cod=".$codProduto);
exit;
?>
