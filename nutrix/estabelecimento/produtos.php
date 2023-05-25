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
    /* Estilo para a página */
    body {
      font-family: Arial, sans-serif;
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

    /*Estilização da tabela dos produtos*/

    h1 {
      text-align: center;
    }

    /* Estilos da tabela */
    table {
      width: 80%;
      margin: 0 auto;
      border-collapse: collapse;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    th, td {
      padding: 12px;
      text-align: center;
      border: 1px solid #ddd;
    }
    th {
      background-color: #f8f9fa;
      font-weight: bold;
    }
    td img {
      max-width: 100px;
      max-height: 100px;
    }

    /* Estilos do botão */
    .add-button {
      display: block;
      width: 200px;
      margin: 20px auto;
      padding: 12px;
      text-align: center;
      background-color: #007bff;
      color: #fff;
      text-decoration: none;
      border-radius: 4px;
      transition: background-color 0.3s;
    }
    .add-button:hover {
      background-color: #0056b3;
    }
    .cabecalho-tabela{

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
  <main>
    <section>
      <div class="cabecalho-tabela">
        <h1>Tabela dos proutos</h1>
        <a href="adicionar_produto.php" class="add-button">
          Adicionar Produto
        </a>
      </div>
      <table>
        <thead>
          <tr>
            <th>Nome</th>
            <th>Tipo</th>
            <th>Foto</th>
            <th>Preço</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
          require_once "../conexao.php";
              // Verificar a conexão
          if (!$conexao) {
            die('Erro ao conectar ao banco de dados: ' . mysqli_connect_error());
          }

              // Selecionar todas as lojas da tabela 'estabelecimento'
          $sql = "SELECT * FROM produto";
          $result = mysqli_query($conexao, $sql);

          while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['nome']}</td>";
            echo "<td>{$row['cod']}</td>";
            echo "<td><img src='{$row['foto']}' alt='Foto do Produto'></td>";
            echo "<td>{$row['valor']}</td>";
            echo "<td><a href='alterar_produto.php' class='add-button'><img = src=''></a></td>";
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
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



