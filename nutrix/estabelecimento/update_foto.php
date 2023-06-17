<?php
require_once "../conexao.php";
session_start();

$codProduto = $_GET['cod'];
$cnpjEstabelecimento = $_SESSION['cnpj'];
$caminho_arquivo = "";
$sql = $conexao->query("UPDATE produto SET foto = '$caminho_arquivo' WHERE cod='$codProduto'");

$destino = 'imagens_produto/'; // Pasta de destino
$nome_arquivo = uniqid() . '_' . $_FILES['foto']['name']; // Nome do arquivo com prefixo único
$caminho_arquivo = $destino . $nome_arquivo;
if (move_uploaded_file($_FILES['foto']['tmp_name'], $caminho_arquivo)) {} else {}

$sql = $conexao->query("UPDATE produto SET foto = '$caminho_arquivo' WHERE cod='$codProduto'");

$conexao->close();
header("Location: alterar_produto.php?cod=".$codProduto);
exit;
?>