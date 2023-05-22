<?php session_start();if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {header("Location: entre_business.php");exit();} $_SESSION['alteracao_dados_estabelecimento']="";?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Album Bootstrap</title>
  <link rel="shortcut icon" type="image/x-icon" href="../img/icones/todos/favicon.ico">
  <link rel="stylesheet" type="text/css" href="../estilos/estilo.css">
  <style>
    html, body{
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
      width: 2rem;
      margin-top: 1rem;
     font-size: 30px;
     color: #000;
     text-decoration: none;
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

    .logout {
      margin: 10px;
    }
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
</style>
</head>
<body>


  <header>
    <div id="main">
      <span style="font-size:30px;cursor:pointer" class="home-icon" onclick="openNav()">
        <img class="home-icon" src="../img/icones/icones-gerais/menu-burguer.png">
      </span>
      <h1 id="h1">Dashboard</h1>
    </div>
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a href="dashboard_estabelecimento.php">Dashboard</a>
      <a href="perfil_estabelecimento.php">Dados de conta</a>
      <a href="produtos.php">Produtos</a>
      <a href="fecha_sessao.php">Sair</a>
    </div>
  </header>
  


  <main>
    <section>

    </section>
  </main>
  <footer>
    <!-- Rodapé aqui -->
  </footer>

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



