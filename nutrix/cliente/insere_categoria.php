<?php
session_start();
// Estabelece a conexão com o banco de dados
require_once "../conexao.php";

// Obtém o valor do CPF do formulário anterior
$cpf = $_SESSION['cpf'];

//Obtém as categorias selecionadas
$categorias = $_POST['categoria_cliente'];
var_dump($categorias);
    
// Verifica se as categorias foram selecionadas
if (is_array($categorias)) {
    // Insere as categorias selecionadas no banco de dados
    foreach ($categorias as $categoria) {
        $sql = "INSERT INTO cliente_categoria (cpf_cliente, cod_categoria) VALUES ('$cpf', '$categoria')";

        if (!mysqli_query($conexao, $sql)) {
            echo "Erro ao adicionar categoria: " . mysqli_error($conexao);
        }
    }
} else {
    echo "Nenhuma categoria selecionada.";
}

// Fecha a conexão com o banco de dados
mysqli_close($conexao);
?>
