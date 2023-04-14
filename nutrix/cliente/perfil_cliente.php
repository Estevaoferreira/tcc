<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Perfil do usuário</title>
  <style>
    /* Estilo para a página */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    /* Estilo para o cabeçalho */
    header {
      background-color: #333;
      color: #fff;
      padding: 20px;
      text-align: center;
    }

    /* Estilo para o formulário */
    form {
      margin: 20px;
    }

    /* Estilo para os campos do formulário */
    label {
      display: block;
      margin-bottom: 10px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    /* Estilo para os botões */
    button {
      background-color: #4CAF50;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    button:hover {
      background-color: #3e8e41;
    }

    /* Estilo para o link de logout */
    .logout {
      display: block;
      text-align: right;
      margin: 20px;
    }

    /* Ajustes para dispositivos móveis */
    @media only screen and (max-width: 600px) {
      header h1 {
        font-size: 24px;
      }

      form {
        margin: 10px;
      }

      input[type="text"],
      input[type="email"],
      input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        font-size: 16px;
      }

      button {
        padding: 8px 16px;
        font-size: 16px;
      }

      .logout {
        margin: 10px;
      }
    }
  </style>
  <script>
    function editarDados() {
      var name = document.getElementById("name").value;
      var email = document.getElementById("email").value;
      var password = document.getElementById("password").value;

      var xhr = new XMLHttpRequest();
      xhr.open("POST", "salvar_dados.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("mensagem").innerHTML = this.responseText;
        }
      };
      xhr.send("name=" + name + "&email=" + email + "&password=" + password);
    }
  </script>
</head>
<body>
  <header>
    <h1>Perfil do usuário</h1>
  </header>

  <form>
    <?php
      // Conexão com o banco de dados
    require_once "../conexao.php";
    session_start();
    echo $_SESSION['nome'];
    $nome = $_SESSION['nome'];
  // Query para buscar os dados do usuário
  $sql = "SELECT * FROM cliente WHERE nome =".$nome; // Ajuste o ID para o valor correto

  if (!$conexao) {
    die('Erro ao conectar ao banco de dados: ' . mysqli_connect_error());
  }
  // Executa a query
  $result = mysqli_query($conexao, $sql);
  // Verifica se há dados
  if ($result->num_rows > 0) {
    // Exibe os dados do usuário
    while($row = $result->fetch_assoc()) {
      echo '<label for="name">Nome:</label>';
      echo '<input type="text" id="name" name="name" value="' . $row["nome"] . '">';

      echo '<label for="email">E-mail:</label>';
      echo '<input type="email" id="email" name="email" value="' . $row["email"] . '">';

      echo '<label for="password">Senha:</label>';
      echo '<input type="password" id="password" name="password" value="' . $row["senha"] . '">';

      echo '<button type="button" onclick="editarDados()">Salvar</button>';
      echo '<div id="mensagem"></div>';
    }
  } else {
    echo "Nenhum dado encontrado.";
  }

  // Fecha a conexão
  $mysqli->close();
  ?>
</form>
<a href="logout.php" class="logout">Encerrar sessão</a>

</body>
</html>