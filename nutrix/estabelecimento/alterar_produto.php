<?php
require_once "../conexao.php";
session_start();
$codProduto = $_GET['cod'];
$cnpjEstabelecimento = $_SESSION['cnpj'];
if (!$conexao) {
  die('Erro ao conectar ao banco de dados: ' . mysqli_connect_error());
}

              // Selecionar todas as lojas da tabela 'estabelecimento'
$sql = "SELECT * FROM produto WHERE cod = '$codProduto' AND cnpj_estabelecimento = '$cnpjEstabelecimento'";
$result = mysqli_query($conexao, $sql);

while ($row = mysqli_fetch_assoc($result)) {
  $nome_produto = $row['nome'];
  $descricao_produto = $row['descricao'];
  $valor_produto = $row['valor'];
  $cnpj = $row['cnpj_estabelecimento'];
  $foto = $row['foto'];
  $composicao = $row['compo'];
}

$sql = "SELECT * FROM ingrediente
INNER JOIN produto_ingrediente ON produto_ingrediente.cod_ingrediente = ingrediente.cod
WHERE produto_ingrediente.cod_produto = '$codProduto'";
$result = mysqli_query($conexao, $sql);
$somaIngredientes = $result->num_rows;
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.104.2">
  <title>Checkout example · Bootstrap v5.2</title>
  <link rel="shortcut icon" type="image/x-icon" href="../img/icones/todos/favicon.ico">
  <link href="../estilos/bootstrap-exemplos/assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../estilos/estilo.css">
  <style>
    body{
      font-family: 'Roboto', sans-serif;
      color: #4A5443;
      background-color: #74AB4D;
    }
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3rem;
      }
    }

    .b-example-divider {
      height: 3rem;
      background-color: rgba(0, 0, 0, .1);
      border: solid rgba(0, 0, 0, .15);
      border-width: 1px 0;
      box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh;
    }

    .bi {
      vertical-align: -.125em;
      fill: currentColor;
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }

    .container {
      max-width: 960px;
    }
    .containerLista {
      display: flex;
      justify-content: space-between;
    }

    .lista {
      width: 50%;
    }
    .listaUm{
      background-color: white;
      border-radius: 5px;
      border: solid #4A5443;
    }
    .listaDois{
      background-color: white;
      border-radius: 5px;
      border: solid #4A5443;
      border-left: 2.5px;
    }
    button[type=button]{
      width: 20%;
      border: none;
      border-radius: 5px;
      
      color: #fff;
      font-size: 1rem;
      cursor: pointer;
    }
    button > a{
      text-decoration: none;
      color: white;
    }
    button > a:hover{
      text-decoration: underline;
      color: white;
    }
    main > div > img{
      max-width: 300px;
      max-height: 600px;
      border-radius: 10px;
    }

    main > div > button{
      background-color: red;
    }
    .remover-ingrediente{
      background-color: #dc3545;
    }

    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-content {
      background-color: #fefefe;
      margin: 10% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
    }

    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
    }
  </style>

  <!-- Custom styles for this template -->
  <link href="form-validation.css" rel="stylesheet">
</head>
<body>
  <div class="container">
    <main>
      <div class="py-5 text-center">
        <?php if($foto === ""){?>
       <img class="d-block mx-auto mb-4" src="<?php echo $foto ?>" alt="Nenhuma imagem de produto encontrada" style="color: white; text-decoration: underline; cursor: url('../img/svg/sadCursor.svg'), auto;">
        <?php }else{ ?>
       <img class="d-block mx-auto mb-4" src="<?php echo $foto ?>" alt="Nenhuma imagem de produto encontrada" style="color: white; text-decoration: underline;">
     <?php }?>
        <h2><?php echo $nome_produto; ?></h2>
        <p class="lead">Aqui você poderá fazer as alterações relacionadas ao seu produto</p>
        <div class="mt-3">
          <a href="drop_image.php?cod=<?php echo $codProduto; ?>" class="btn btn-danger">Excluir Imagem</a>
          <a href="#" class="btn btn-success open-modal" data-toggle="modal" data-target="#myModal">Alterar imagem</a>
        </div>
      </div>

      <!-- Modal -->
      <div id="myModal" class="modal">
        <div class="modal-content">
          <span class="close">&times;</span>
          <h2>Faça upload da sua imagem</h2>
          <form action="update_foto.php?cod=<?php echo $codProduto; ?>" method="POST" enctype="multipart/form-data">
            <label for="foto">Foto do produto</label>
            <input type="file" id="foto" name="foto" accept="image/jpeg, image/png" required>
            <button class="btn btn-primary btn-lg" type="submit">Concluir alteração</button>
          </form>
        </div>
      </div>

      <div class="row g-5">

        <!-- Inicio da tabela lateral de ingredientes -->
        <div class="col-md-5 col-lg-4 order-md-last">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-primary">Ingredientes do produto</span>
            <span class="badge bg-primary rounded-pill"><?php echo $somaIngredientes; ?></span>
          </h4>
          <ul class="list-group mb-3">
            <?php 
            $sql = "SELECT * FROM ingrediente
            INNER JOIN produto_ingrediente ON produto_ingrediente.cod_ingrediente = ingrediente.cod
            WHERE produto_ingrediente.cod_produto = '$codProduto'";
            $result = mysqli_query($conexao, $sql);
            $somaIngredientes = $result->num_rows;
            

            while ($row = mysqli_fetch_assoc($result)) {
              $codIngrediente = $row['cod_ingrediente'];  
              ?>
              <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                  <h6 class="my-0"><?php echo $row['nome'] ?></h6>
                  <small class="text-muted">legenda</small>
                </div>
                <span class="text-muted"> código <?php echo $row['cod'] ?></span>
              </li>
              <?php 
            }
            ?>
          </ul>
        </div>
        <!-- Final da tabela lateral de ingredientes -->


        <div class="col-md-7 col-lg-8">
          <h4 class="mb-3">Informações do produto</h4>

          <!-- Inicio do formulário -->
          <form class="needs-validation" id="formulario" action="update_produto.php?cod=<?php echo $codProduto?>" method="POST" enctype="multipart/form-data">
            <div class="row g-3">
              <div class="col-sm-6">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" placeholder="" value="<?php echo $nome_produto; ?>" required="">
                <div class="invalid-feedback">
                  Nome requerido
                </div>
              </div>

              <div class="col-12">
                <label for="descricao" class="form-label">Descrição do produto</label>
                <div class="input-group has-validation">
                  <input type="text" class="form-control" name="descricao" id="descricao" placeholder="" required="" value="<?php echo $descricao_produto; ?>">
                  <div class="invalid-feedback">
                    Descrição requerida
                  </div>
                </div>
              </div>

              <div class="col-12">
                <label for="valor" class="form-label"><strong>R$</strong> p/unidade</label>
                <input type="text" class="form-control" name="valor" id="valor" pattern="\d{1,10}\.\d{0,4}" title="Valor máximo 9999999999.9999" placeholder="" value="<?php echo $valor_produto; ?>">
                <div class="invalid-feedback">
                  Valor unitário requerido
                </div>
              </div>

              <div class="col-12">
                <label for="composicao" class="form-label">Composição nutricional</label>
                <input type="text" class="form-control" name="composicao" id="composicao" required="" value="<?php echo $composicao ?>">
                <div class="invalid-feedback">
                  Composição nutricional requerida
                </div>
              </div>

              <label for="descricao">Ingrediente:<span class="text-muted"> (Adicionar ingredientes clique no "+")</span></label>
              <div id="ingredientesContainer"></div>
              <button type="button" class="btn btn-success" id="adicionarIngrediente">&plus;</button>


              <div class="d-flex justify-content-between">
                <div class="listaUm">
                  <fieldset class="col-12">
                    <legend style="float: none; margin: 1rem;">Categoria do produto: </legend>
                    <label>
                      <?php   
                      //$sql = "SELECT cod, nome FROM categoria WHERE tipo = 'estabelecimento'";
                      //$result = mysqli_query($conexao, $sql);
                      $sql = $conexao->query("SELECT cod, nome FROM categoria WHERE tipo = 'estabelecimento'");
                      while ($obj = $sql->fetch_object()) {
                        ?>
                        <input style="float: none; margin: 1rem;" type="checkbox" name="categoria_produto[]" value="<?php echo $obj->cod; ?>"><?php echo $obj->nome; ?><br>
                        <?php 
                      }
                      ?>
                    </label><br>
                  </fieldset>
                </div>
                <div class="listaDois">
                  <fieldset class="col-12">
                    <legend style="float: none; margin: 1rem;">Público de interesse: </legend>
                    <label>
                      <?php
                      //$sql = "SELECT cod, nome FROM categoria WHERE tipo = 'cliente'";
                      //$result = mysqli_query($conexao, $sql);
                      $sql = $conexao->query("SELECT cod, nome FROM categoria WHERE tipo = 'cliente'");
                      while ($obj = $sql->fetch_object()) {
                        ?>
                        <input style="float: none; margin: 1rem;" type="checkbox" name="categoria_cliente[]" value="<?php echo $obj->cod; ?>"><?php echo $obj->nome; ?><br>
                        <?php 
                      }
                      ?>
                    </label><br>
                  </fieldset>
                </div>
              </div>


              <div class="col-12">
                <label for="cnpj" class="form-label">CNPJ do estabelecimento<span class="text-muted"> (somente visualização)</span></label>
                <input type="text" class="form-control" name="cnpj" value="<?php echo $cnpj; ?>" disabled id="cnpj" placeholder="">
              </div>
            </div>

            <hr class="my-4">

            <div class="d-flex justify-content-between">
              <button class="btn btn-primary btn-lg" type="submit">Concluir alteração</button>
              <button class="btn btn-danger btn-lg"><a href="drop_produto.php?cod=<?php echo $codProduto; ?>">Excluir produto</a></button>
            </div>

          </form>
          <!-- Final do formulário -->

        </div>
      </div>
    </main>

    <footer class="my-5 pt-5 text-muted text-center text-small">
      <p class="mb-1">© 2023 - Nutrix</p>
      <ul class="list-inline">
        <li class="list-inline-item"><a href="#">Desenvolvedor</a></li>
        <li class="list-inline-item"><a href="#">GitHub</a></li>
      </ul>
    </footer>
  </div>

  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

  <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
      'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
      const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
      Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }

          form.classList.add('was-validated')
        }, false)
      })
    })()

    document.addEventListener("DOMContentLoaded", function() {
  // Variável para contar o número de campos de ingrediente
      let contadorIngredientes = 0;

  // Seleciona o contêiner dos ingredientes
      const ingredientesContainer = document.getElementById("ingredientesContainer");

  // Seleciona o botão para adicionar ingredientes
      const adicionarIngredienteBtn = document.getElementById("adicionarIngrediente");

  // Adiciona um evento de clique ao botão para adicionar ingredientes
      adicionarIngredienteBtn.addEventListener("click", function() {
    // Incrementa o contador de ingredientes
        contadorIngredientes++;

    // Cria os elementos HTML para o campo de ingrediente
        const campoIngrediente = document.createElement("div");
        campoIngrediente.classList.add("campo-ingrediente");

        const labelIngrediente = document.createElement("label");
        labelIngrediente.for = "ingrediente" + contadorIngredientes;
        labelIngrediente.textContent = "Ingrediente " + contadorIngredientes + ":";

        const inputIngrediente = document.createElement("input");
        inputIngrediente.type = "text";
        inputIngrediente.id = "ingrediente" + contadorIngredientes;
    inputIngrediente.name = "ingredientes[]"; // Use [] para indicar um array de valores

    const removerIngredienteBtn = document.createElement("button");
    removerIngredienteBtn.type = "button";
    removerIngredienteBtn.classList.add("remover-ingrediente");
    removerIngredienteBtn.textContent = "x";
    removerIngredienteBtn.addEventListener("click", function() {
      // Remove o campo de ingrediente quando o botão de remover é clicado
      campoIngrediente.remove();
    });

    // Adiciona os elementos criados ao contêiner dos ingredientes
    campoIngrediente.appendChild(labelIngrediente);
    campoIngrediente.appendChild(inputIngrediente);
    campoIngrediente.appendChild(removerIngredienteBtn);
    ingredientesContainer.appendChild(campoIngrediente);
  });
    });



    //Modal
    document.addEventListener("DOMContentLoaded", function() {
      var openModalLinks = document.getElementsByClassName("open-modal");
      var modal = document.getElementById("myModal");
      var closeBtn = modal.getElementsByClassName("close")[0];

  // Abrir modal ao clicar no link
      for (var i = 0; i < openModalLinks.length; i++) {
        openModalLinks[i].addEventListener("click", function() {
          modal.style.display = "block";
        });
      }

  // Fechar modal ao clicar no botão de fechar
      closeBtn.addEventListener("click", function() {
        modal.style.display = "none";
      });

  // Fechar modal ao clicar fora da modal
      window.addEventListener("click", function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
      });
    });
  </script>
</body>
</html>
