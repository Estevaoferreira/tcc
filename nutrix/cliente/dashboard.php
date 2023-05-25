<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Album Bootstrap</title>
  <link rel="shortcut icon" type="image/x-icon" href="../img/icones/todos/favicon.ico">
  <link rel="stylesheet" type="text/css" href="../estilos/estilo.css">
  <link href="../estilos/bootstrap-exemplos/assets/dist/css/bootstrap.min.css" rel="stylesheet">
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
      background-color: white;
      color: black;
      padding: 20px;
      text-align: center;
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

    /* Estilo para o link de logout */

    .sidenav {
      height: 100%;
      width: 0;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: #111;
      overflow-x: hidden;
      transition: 0.5s;
      padding-top: 60px;
      text-align: left;
    }

    .sidenav > a {
      padding: 8px 8px 8px 32px;
      text-decoration: none;
      font-size: 25px;
      color: #818181;
      display: block;
      transition: 0.3s;
    }

    .sidenav .closebtn {
      position: absolute;
      top: 0;
      right: 25px;
      font-size: 36px;
      margin-left: 50px;
    }

    #main {
      transition: margin-left .5s;
      padding: 16px;
      color: black;
      display: flex;
      justify-content: space-between;
    }

    .home-icon {
      width: 2rem;
      margin-top: 1rem;
      font-size: 30px;
      color: #000;
      text-decoration: none;
    }
    @media screen and (max-height: 450px) {
      .sidenav {padding-top: 15px;}
      .sidenav a {font-size: 18px;}
      .home-icon {
        width: 2rem;
        margin-top: 1rem;
        font-size: 30px;
        color: #000;
        text-decoration: none;
      }
      .home-icon img{
        width: 2rem;
        font-size: 30px;
        color: #000;
        text-decoration: none;
      }
    }

    .categoria{
      color: white;
      margin-left: 3rem;
    }

    .lista_categorias{
      display: none;
      color: red;
    }

    .categoria:hover .lista_categorias {
      display: block;
      text-decoration: none;

    }




  </style>
</head>
<body>

  <header>
    <div id="main">
      <span style="font-size:30px;cursor:pointer" class="home-icon" onclick="openNav()">
        <img class="home-icon" src="../img/icones/icones-gerais/menu-burguer.png">
      </span>
      <div class="logo">
        <img src="../img/icones/meu-favicon.png" alt="Nutrix Logo">
        <h1>Nutrix</h1>
      </div>
    </div>
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a href="perfil_cliente.php">Dados de conta</a>
      <a href="javascript:void(0)" id="categoria" onmouseover="openCategoria()">Categorias</a>
      <li style="list-style: none;">
      <ul>
        <div class="categoria">
          <?php
          require_once "../conexao.php";

            // Verificar a conexão
          if (!$conexao) {
            die('Erro ao conectar ao banco de dados: ' . mysqli_connect_error());
          }

            // Selecionar todas as lojas da tabela 'estabelecimento'
          $sql = "SELECT nome FROM categoria";
          $result = mysqli_query($conexao, $sql);

            // Loop para gerar o HTML para cada categoria
          while ($row = mysqli_fetch_assoc($result)) {
              // Construir o HTML para exibir a categoria
            echo '<li class="lista_categorias"><a  href="search.php?categoria='.$row['nome'].'" style="text-decoration: none;">' . $row['nome'] . '</a></li>';
          }
          ?>
        </div>
      </ul>
    </li>
    <a href="fecha_sessao.php">Sair</a>
  </div>
</header>



<main>
    <section class="py-5 text-center container">
      <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
          <h1 class="fw-light">Aproveite a experiência</h1>
        </div>
      </div>
    </section>
    <div class="album py-5 bg-light">
      <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          <!---Inicio de um card-->
              <div class="col">
                <div class="card shadow-sm">
                  <img src="/tcc/nutrix/estabelecimento/<?php echo $caminho_foto; ?>" class="bd-placeholder-img card-img-top" width="100%" height="225" aria-label="Placeholder: Thumbnail" role="img" preserveAspectRatio="xMidYMid slice" focusable="false">
                  <div class="card-body">
                    <p class="card-text"><?php echo $row['descricao']; ?></p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-secondary">&hearts;</button>
                      </div>
                      <small class="text-muted"><?php echo $row['nome']; ?></small>
                    </div>
                  </div>
                </div>
              </div>
          <!---Final de um card-->
          <!---Inicio de um card-->
              <div class="col">
                <div class="card shadow-sm">
                  <img src="/tcc/nutrix/estabelecimento/<?php echo $caminho_foto; ?>" class="bd-placeholder-img card-img-top" width="100%" height="225" aria-label="Placeholder: Thumbnail" role="img" preserveAspectRatio="xMidYMid slice" focusable="false">
                  <div class="card-body">
                    <p class="card-text"><?php echo $row['descricao']; ?></p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-secondary">&hearts;</button>
                      </div>
                      <small class="text-muted"><?php echo $row['nome']; ?></small>
                    </div>
                  </div>
                </div>
              </div>
          <!---Final de um card-->
        </div>
      </div>
    </div>
  </main>
<footer>
  <!-- Rodapé aqui -->
</footer>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    function carregarDados() {
      $.ajax({
        url: 'pesquisa_estabelecimento.php',
        method: 'GET',
        dataType: 'html',
        success: function(data) {
          $('#estabelecimentos').html(data);
        },
        error: function(xhr, status, error) {
          console.log('Erro na solicitação AJAX: ' + error);
        }
      });
    }

    carregarDados();
    setInterval(carregarDados, 5000);
  });


  $(document).ready(function() {
    function carregarProduto() {
      $.ajax({
        url: 'pesquisa_produto.php',
        method: 'GET',
        dataType: 'html',
        success: function(data) {
          $('#produto').html(data);
        },
        error: function(xhr, status, error) {
          console.log('Erro na solicitação AJAX: ' + error);
        }
      });
    }

    carregarProduto();

    setInterval(carregarProduto, 5000)
  });


  $(document).ready(function() {
    function carregarCategorias() {
      $.ajax({
        url: 'pesquisa_categorias.php',
        method: 'GET',
        dataType: 'html',
        success: function(data) {
          $('#subcategorias').html(data);
        },
        error: function(xhr, status, error) {
          console.log('Erro na solicitação AJAX: ' + error);
        }
      });
    }

    carregarCategorias();

    setInterval(carregarCategorias, 5000)
  });

  function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    document.getElementById("h1").style.color = "white";
  }

  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.getElementById("h1").style.color = "Black";
  }

  function openCategoria() {
    var subcategorias = document.getElementsByClassName('lista_categorias');
    for (var i = 0; i < subcategorias.length; i++) {
      subcategorias[i].style.display = 'block';
    }
  }

  function closeCategoria() {
    var subcategorias = document.getElementsByClassName('lista_categorias');
    for (var i = 0; i < subcategorias.length; i++) {
      subcategorias[i].style.display = 'none';
    }
  }


</script>

  <!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper-core.min.js" integrity="sha384-QhJtrlyXT+YfjA/ov0U+O6wZi6U68MZkUmmI9Q0T3TGRnp6YOsJlLCFNYFOIQWIH" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.min.js" integrity="sha384-2S6U8By6k/gz6oAe6TmKa4+lXbvo0c0FjxFdOtZ2S7C8wYnxUksjAaJHvmNGV7LX" crossorigin="anonymous"></script>
  
  Adicione no final do arquivo HTML, antes do fechamento do body 
  
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
-->

</body>
</html>



