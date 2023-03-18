<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Album Bootstrap</title>
  <link rel="shortcut icon" type="image/x-icon" href="img/icones/todos/favicon.ico">
  <link rel="stylesheet" type="text/css" href="estilos/estilo.css">
  <link href="estilos/bootstrap-exemplos/assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    html,
    body {
      height: 100%;
    }

    body {
      display: flex;
      flex-direction: column;
    }

    .main {
      flex: 1;
    }

    .album {
      background-color: #f8f9fa;
    }

    .card {
      margin-bottom: 1.5rem;
      box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }

    .card-img-top {
      height: 225px;
      object-fit: cover;
    }

    .card-text {
      margin-bottom: 1rem;
    }

    .btn-group {
      margin-right: 0.5rem;
    }

    .text-muted {
      font-size: 0.875rem;
    }
    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      height: 60px;
      background-color: #fff;
      padding: 0 20px;
      box-shadow: 0px 2px 5px rgba(0,0,0,0.1);
    }

    .logo {
      display: flex;
      align-items: center;
      font-weight: bold;
    }

    .logo img {
      width: 40px;
      height: 40px;
      margin-right: 10px;
    }

    .user a {
      text-decoration: none;
      color: #333;
      font-weight: bold;
    }
    .user img {
      width: 40px;
      height: 40px;
      margin-right: 10px;
    }
    form {
      display: flex;
      align-items: center;
    }

    input[type="text"] {
      padding: 10px;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      flex: 1;
    }

    button[type="submit"] {
      padding: 10px;
      border: none;
      border-radius: 5px;
      background-color: #007bff;
      color: #fff;
      font-size: 16px;
      margin-left: 10px;
    }
  </style>
</head>
<body>
  <header>
    <div class="logo">
      <img src="img/icones/meu-favicon.png" alt="Nutrix Logo">
      <h1>Nutrix</h1>
    </div>
    <div class="user">
      <a href="#"><img id="logo" src="img/icones/chat-off-icon.png"></a>
      <a href="outra_pagina.html">Usuário</a>
    </div>
  </header>
  <main>
    <section class="py-5 text-center container">
      <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
          <h1 class="fw-strong">Lojas parceiras</h1>
          <p class="lead text-muted">Aproveite a experiência!</p>
        </div>
      </div>
      <div class="album py-5 bg-light">
        <div class="container">
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

            <?php
              // Conectar ao banco de dados
              require_once "conexao.php";

              // Verificar a conexão
              if (!$conexao) {
                die('Erro ao conectar ao banco de dados: ' . mysqli_connect_error());
              }

              // Selecionar todas as lojas da tabela 'estabelecimento'
              $sql = "SELECT * FROM estabelecimento";
              $result = mysqli_query($conexao, $sql);

              // Loop para exibir as informações em cada card
              while ($row = mysqli_fetch_assoc($result)) {
                echo '
                <div class="col">
                  <div class="card shadow-sm">
                    <img src="' . $row['cpf'] . '" class="card-img-top" alt="' . $row['nome'] . '">
                    <div class="card-body">
                      <h5 class="card-title">' . $row['nome'] . '</h5>
                      <p class="card-text">' . $row['email'] . '</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                          <a href="' . $row['senha'] . '" class="btn btn-sm btn-outline-secondary" target="_blank">Visitar</a>
                        </div>
                        <small class="text-muted">' . $row['telefone'] . '</small>
                      </div>
                    </div>
                  </div>
                </div>
                ';
              }
              // Fechar a conexão
              mysqli_close($conexao);
            ?>

          </div>
        </div>
      </div>
    </section>
  </main>
  <footer>
    <!-- Rodapé aqui -->
  </footer>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper-core.min.js" integrity="sha384-QhJtrlyXT+YfjA/ov0U+O6wZi6U68MZkUmmI9Q0T3TGRnp6YOsJlLCFNYFOIQWIH" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.min.js" integrity="sha384-2S6U8By6k/gz6oAe6TmKa4+lXbvo0c0FjxFdOtZ2S7C8wYnxUksjAaJHvmNGV7LX" crossorigin="anonymous"></script>
  <!-- Adicione no final do arquivo HTML, antes do fechamento do body -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha384-0J8RNpvvoHGPmvoBPs+OqQ3fURbXVjYYpO7bFXyham6KLrO6zFyEN5kNQ=="
  crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.3/dist/esm/popper.min.js"
  integrity="sha384-9fgPXn7EKdptxIMH2QoZzg/hu1tLZy/9tRry/Kt4i4t+h/tNY2qA3DZwV7aS/QS3"
  crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
  integrity="sha384-pgxoU6e2U6j++H6nPy1xvZ1WwG8kzjK6glcLqbrhXWdy/TygoKwnb07ceINjFhva"
  crossorigin="anonymous"></script>
  <script>
  // Adicione este código dentro de um bloco de script no final do arquivo HTML
    $(document).ready(function() {
    // Adicione o comportamento de pesquisa
      $('#search-form').on('submit', function(e) {
      e.preventDefault(); // Impedir a submissão do formulário
      var query = $('#search-input').val(); // Obter a consulta de pesquisa
      if (query) {
        // Redirecionar para a página de resultados de pesquisa
        window.location.href = 'pesquisa.php?query=' + encodeURIComponent(query);
      }
    });
    });
  </script>

</body>
</html>



