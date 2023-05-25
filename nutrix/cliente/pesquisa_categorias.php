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
$sql = "SELECT * FROM categoria";
$result = mysqli_query($conexao, $sql);

// Inicializar uma variável para armazenar o HTML gerado
$html = '';

// Loop para gerar o HTML para cada card
while ($row = mysqli_fetch_assoc($result)) {

  // Construir o HTML para exibir a imagem e as informações
  $html .= '
    <div class="col">
      <div class="card shadow-sm">
        <div class="card-body">
          <h5 class="card-title">' . $row['nome'] . '</h5>
          <p class="card-text">' . $row['telefone'] . '</p>
          <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
              <small class="text-muted">' . $row['bairro'] . '</small>
            </div>
            <small class="text-muted">' . $row['cidade'] . '</small>
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
