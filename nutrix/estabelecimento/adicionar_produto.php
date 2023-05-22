<?php session_start();if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {header("Location: entre_business.php");exit();}?>
<!DOCTYPE html> 
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="../img/icones/todos/favicon.ico">
  <link href="../estilos/bootstrap-exemplos/assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Cadastre-se</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <style type="text/css">
    body{
      background: linear-gradient(to right, green, greenyellow);
      font-family: 'Roboto', sans-serif;
      margin: 0;
      padding: 0;
    }
    header {
      background-color: white;
      color: black;
      padding: 20px;
      text-align: center;
    }
    .home-icon {
      width: 2rem;      color: #000;
      text-decoration: none;
    }
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
    }
    .sidenav a {
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
    @media screen and (max-height: 450px) {
      .sidenav {padding-top: 15px;}
      .sidenav a {font-size: 18px;}
      header h1 {
        font-size: 24px;
      }
      .home-icon {
        padding: 0;
        width: 2rem;
        margin-top: 1rem;
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

    .register-form {
      width: 300px;
      display: block;
      margin: 0 auto;
      margin-top: 6rem;
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    }

    h1 {
      text-align: center;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    input[type=text], input[type=number], input[type=email], input[type=password], .select, input[type=file]{
      width: 100%;
      padding: 10px;
      margin: 5px 0 15px 0;
      border: none;
      border-radius: 5px;
      background-color: #f2f2f2;
    }

    .error-message {
      color: red;
      font-weight: bold;
      margin-bottom: 10px;
    }

    button[type=submit] {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 5px;
      background-color: #4CAF50;
      color: #fff;
      font-size: 16px;
      cursor: pointer;
    }

    button[type=submit]:hover {
      background-color: #45a049;
    }
    .register-form{
      margin-top: 80px
    }

  </style>
</head>
<body>
  <header>
    <div id="main">
      <span style="font-size:30px;cursor:pointer" class="home-icon" onclick="openNav()">
        <img class="home-icon" src="../img/icones/icones-gerais/menu-burguer.png">
      </span>
      <h1 id="h1">Produtos</h1>
    </div>
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a href="dashboard_estabelecimento.php">Dashboard</a>
      <a href="perfil_estabelecimento.php">Dados de conta</a>
      <a href="produtos.php">Produtos</a>
      <a href="fecha_sessao.php">Sair</a>
    </div>
  </header>

  <div class="register-form">
    <h1>Cadastro</h1>

    <!-- Inicio do formulário-->
    <form id="formulario" action="insere_produto.php" method="POST">
      <label for="nome">Nome:</label>
      <input type="text" id="nome" name="nome" required>

      <label for="categorias">Selecione as categorias:</label>
      <select id="categorias" name="categorias[]" multiple class="select">
        <?php
    // Conexão com o banco de dados
        require_once "../conexao.php";
              // Verificar a conexão
        if (!$conexao) {
          die('Erro ao conectar ao banco de dados: ' . mysqli_connect_error());
        }

    // Consulta para obter as categorias
        $sql = "SELECT cod, nome FROM categoria";
        $result = mysqli_query($conexao, $sql);

    // Exibir as opções do select
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<option value="' . $row['cod'] . '">' . $row['nome'] . '</option>';
        }

    // Fechar a conexão com o banco de dados
        $result->close();
        ?>
      </select>

      <label for="foto">Foto do produto</label>
      <input type="file" id="foto" name="foto" accept=".png, .svg, .jpg, .jpeg" required>

      <label for="desc-prod">Descrição do produto:</label>
      <input type="text" id="desc-prod" name="desc-prod" required>

      <label for="valor">Valor:</label>
      <input type="number" id="valor" name="valor" step="0.01" min="0" pattern="^\d{1,6}(\.\d{0,2})?$" required>

      <button type="submit">Adicionar</button>
    </form>
    <!-- Final do formulário-->

  </div>
  <script>
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
  </script>
</body>
</html>
</html>