<?php
require_once "../conexao.php";
$codProduto = $_GET['cod'];


$sqlProdutoPublico = "DELETE FROM produto_publico WHERE cod_produto = $codProduto";
$sqlProdutoCategoria = "DELETE FROM produto_categoria WHERE cod_produto = $codProduto";
$sqlFavoritoProduto = "DELETE FROM favorito_produto WHERE cod_prod = $codProduto";
$sqlProdutoIngrediente = "DELETE FROM produto_ingrediente WHERE cod_produto = $codProduto";
$sqlProduto = "DELETE FROM produto WHERE cod = $codProduto";


$resultProdutoPublico = mysqli_query($conexao, $sqlProdutoPublico);
$resultProdutoCategoria = mysqli_query($conexao, $sqlProdutoCategoria);
$resultFavoritoProduto = mysqli_query($conexao, $sqlFavoritoProduto);
$resultProdutoIngrediente = mysqli_query($conexao, $sqlProdutoIngrediente);
$resultProduto = mysqli_query($conexao, $sqlProduto);

header("Location: produtos.php");

$conexao->close();
?>