<?php
// Conexão com o banco de dados
require_once "../conexao.php";

// Verificar conexão
if (!$conexao) {
    die('Erro ao conectar ao banco de dados: ' . mysqli_connect_error());
}

// Consulta SQL para obter as categorias
$sql = "SELECT * FROM categoria WHERE tipo = 'cliente'";
$resultado = mysqli_query($conexao, $sql);

// Verificar se há resultados
if (mysqli_num_rows($resultado) > 0) {
    $categorias = array();

    // Iterar sobre os resultados e armazenar as categorias em um array
    while ($row = mysqli_fetch_assoc($resultado)) {
        $categoria = array(
            'cod' => $row['cod'],
            'nome' => $row['nome']
        );
        $categorias[] = $categoria;
    }

    // Enviar as categorias como resposta JSON
    header('Content-Type: application/json');
    echo json_encode($categorias);
} else {
    echo 'Nenhuma categoria encontrada';
}

// Fechar conexão com o banco de dados
mysqli_close($conexao);
?>
