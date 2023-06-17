<?php
require_once "../conexao.php";



?>
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
    header {
      background-color: white;
      color: black;
      padding: 0px;
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
  </style>
</head>
<body>

  <header>
    <article class="my-3" id="navbar">
      <div>
        <div class="bd-example-snippet bd-code-snippet"><div class="bd-example">
          <nav class="navbar navbar-expand-lg" style="background-color: white;">
            <div class="container-fluid">
              <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="navbar-collapse collapse" id="navbarSupportedContent" style="">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link" href="home.php"><h2>Conta</h2></a>
                  </li>
                </ul>
                <div class="logo">
                  <img src="../img/icones/meu-favicon.png" alt="Nutrix Logo">
                  <h1>Nutrix</h1>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </article>
</header>



<main>
  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Alguns dos produtos</h1>
      </div>
    </div>
  </section>
  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" style="justify-content: center;">
        <!---Inicio de um card-->
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel" style="width: 100vh; align-items: center;">
          <div class="carousel-inner">
            <?php
            require_once "../conexao.php";

            if (!$conexao) {
              die('Erro ao conectar ao banco de dados: ' . mysqli_connect_error());
            }

            $sql = "SELECT * FROM produto";
            $result = mysqli_query($conexao, $sql);

        // Loop para gerar o HTML para cada categoria
            while ($row = mysqli_fetch_assoc($result)) {
              $caminho_foto = $row['foto'];
              $caminho_raiz = $_SERVER['DOCUMENT_ROOT'];
              $caminho_pasta = '/tcc/nutrix/estabelecimento/';

              $caminho_foto_completo = $caminho_raiz.$caminho_pasta.$caminho_foto;
          // Construir o HTML para exibir a categoria
              ?>
              <div class="carousel-item active" data-bs-interval="2000">
                <img src="/tcc/nutrix/estabelecimento/<?php echo $caminho_foto; ?>" class="d-block w-100" alt="..." style="object-fit: cover; height: 50vh;">
              </div>

              <?php
            }
            ?>

          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
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
 /* $(document).ready(function() {
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
<script type="text/javascript" src ="../estilos/bootstrap-exemplos/assets/dist/js/bootstrap.bundle.min.js"></script>
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



