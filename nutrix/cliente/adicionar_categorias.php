<?php
session_start();

// Verificar se o CPF do cliente está definido na sessão
if (!isset($_SESSION['cpf'])) {
    echo 'CPF do cliente não encontrado';
    exit;
}

// Verificar se as categorias foram enviadas por POST
if (!isset($_POST['categories'])) {
    echo 'Nenhuma categoria selecionada';
    exit;
}

// Conectar ao banco de dados
require_once "../conexao.php";

// Verificar conexão
if (!$conexao) {
    die('Erro ao conectar ao banco de dados: ' . mysqli_connect_error());
}

// Limpar e validar as categorias enviadas por POST
$categories = $_POST['categories'];
$categories = array_map('intval', $categories);
$categories = array_unique($categories);
$categories = array_filter($categories, function($value) {
    return $value > 0;
});

// Preparar a consulta SQL para inserir as categorias do cliente
$sql = "INSERT INTO cliente_categoria (cpf_cliente, cod_categoria) VALUES ";
$values = array();

foreach ($categories as $category) {
    $values[] = "('" . mysqli_real_escape_string($conexao, $_SESSION['cpf']) . "', $category)";
}

$sql .= implode(', ', $values);

// Executar a consulta SQL
if (mysqli_query($conexao, $sql)) {
    echo 'Categorias adicionadas com sucesso';
} else {
    echo 'Erro ao adicionar categorias: ' . mysqli_error($conexao);
}

// Fechar conexão com o banco de dados
mysqli_close($conexao);
?>
