<?php
session_start();
$_SESSION['alteracao_dados_cliente'] = "";

// Conectar ao banco de dados
require_once "../conexao.php";

// Verificar a conexão
if (!$conexao) {
  die('Erro ao conectar ao banco de dados: ' . mysqli_connect_error());
}

// Selecionar todas as lojas da tabela 'estabelecimento'
$sql = "SELECT * FROM produto";
$result = mysqli_query($conexao, $sql);

// Inicializar uma variável para armazenar o HTML gerado
$html = '';

// Loop para gerar o HTML para cada card
while ($row = mysqli_fetch_assoc($result)) {

// Obter os dados BLOB da coluna 'foto'
  $imagem_blob = $row['foto'];

  // Verificar o tipo de imagem pela extensão do nome do arquivo
  $imagem_extensao = pathinfo($row['foto'], PATHINFO_EXTENSION);

  // Converter os dados BLOB em uma URL base64
  $imagem_data = base64_encode($imagem_blob);
  $imagem_url = 'data:image/' . $imagem_extensao . ';base64,' . $imagem_data;

  // Construir o HTML para exibir a imagem e as informações
  $html .= '
    <div class="col">
      <div class="card shadow-sm">
        <img src="' . $imagem_url . '" class="card-img-top" alt="' . $row['descricao'] . '">
        <div class="card-body">
          <h5 class="card-title">' . $row['nome'] . '</h5>
          <p class="card-text">' . $row['descricao'] . '</p>
          <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
              <a href="' . $row['valor'] . '" class="btn btn-sm btn-outline-secondary" target="_blank">Visitar</a>
            </div>
            <small class="text-muted">' . $row['cnpj_estabelecimento'] . '</small>
          </div>
        </div>
      </div>
    </div>
  ';
}

// Fechar a conexão
mysqli_close($conexao);

// Retorna o HTML gerado
echo $html;
?>
