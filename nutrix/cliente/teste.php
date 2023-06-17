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
<script type="text/javascript" src ="../estilos/bootstrap-exemplos/assets/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>



