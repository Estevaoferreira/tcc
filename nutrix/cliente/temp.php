<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Perfil de usuário</title>
  <link rel="shortcut icon" type="image/x-icon" href="../img/icones/todos/favicon.ico">
  <link rel="stylesheet" type="text/css" href="../estilos/estilo.css">
  <link href="../estilos/bootstrap-exemplos/assets/dist/css/bootstrap.min.css" rel="stylesheet">  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <style>
    /* Estilo para a página */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    /* Estilo para o cabeçalho */
    header {
      background-color: green;
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
    .home-icon {
			position: fixed;
			top: 20px;
			left: 20px;
			font-size: 30px;
			color: #000;
			text-decoration: none;
		}


  </style>
</head>
<body>
  <header>
    <h1>Perfil do usuário</h1>
    <a href="dashboard.php" class="home-icon">
		<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16" style="transform: scale(1.4); color: white;">
			<path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z"/>
			<path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z"/>
		</svg>
	</a>
  </header>

  <form id="form-alterar-dados" method="post">
    <?php
    require_once "../conexao.php";
    session_start();

    $cpf = $_SESSION['cpf'];


    $sql = "SELECT * FROM cliente WHERE cpf = ".$cpf;
    if (!$conexao) {
      die('Erro ao conectar ao banco de dados' . mysqli_connect_error());
    }

    $result = mysqli_query($conexao, $sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo '<label for="cpf">CPF:</label>';
        echo '<input type="text" id="cpf" name="cpf" value="' . $row["cpf"] . '" disabled>';
        echo '<br>';
        echo '<label for="telefone">Telefone:</label>';
        echo '<input type="text" id="telefone" name="telefone" value="' . $row["telefone"] . '">';

        echo '<label for="nome">Nome:</label>';
        echo '<input type="text" id="nome" name="nome" value="' . $row["nome"] . '">';

        echo '<label for="email">E-mail:</label>';
        echo '<input type="text" id="email" name="email" value="' . $row["email"] . '">';

        //echo '<label for="senha">Senha:</label>';
        //echo '<input type="password" id="senha" name="senha" value="' . $row["senha"] . '" disabled>';

        echo '<button type="submit" id="salvar-dados">Salvar</button>';
        echo '<div id="mensagem"></div>';
      }
    } else {
      echo "Nenhum dado encontrado";
    }

  $conexao->close();
  ?>
</form>
<a href="fecha_sessao.php" class="logout">Encerrar sessão</a>
 <script>
  document.addEventListener('DOMContentLoaded', function() {
  // Selecionar o formulário e o botão de envio
    const form = document.querySelector('#form-alterar-dados');
    const submitBtn = document.querySelector('#salvar-dados');
    const mensagem = document.querySelector('#mensagem');

  // Quando o formulário for enviado
    form.addEventListener('submit', function(event) {
    // Impedir o envio normal do formulário
      event.preventDefault();

    // Desabilitar o botão de envio
      submitBtn.disabled = true;

    // Enviar os dados do formulário para o servidor
      fetch('update_cliente.php', {
        method: 'POST',
        body: new FormData(form)
      })
      .then(response => response.json())  
      .then(data => {
      // Se a atualização foi bem sucedida, mostrar uma mensagem de sucesso
        if (data.success) {
          mensagem.innerText = 'Dados atualizados com sucesso!';
        }
      // Caso contrário, mostrar uma mensagem de erro
        else {
          mensagem.innerText = 'Erro ao atualizar dados!';
        }

      // Habilitar o botão de envio
        submitBtn.disabled = false;
      })
      .catch(error => {
      // Mostrar uma mensagem de erro genérica
        mensagem.innerText = 'Ocorreu um erro ao enviar os dados!';

      // Habilitar o botão de envio
        submitBtn.disabled = false;
      });
    });
  });
</script> 

<!--<script>
    function editarDados() {
      var nome      = document.getElementById("nome").value;
      var email     = document.getElementById("email").value;
      var senha     = document.getElementById("senha").value;
      var telefone  = document.getElementById("telefone").value;

      var xhr = new XMLHttpRequest();
      xhr.open("POST", "update_cliente.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("mensagem").innerHTML = this.responseText;
        }
      };
      xhr.send("nome=" + nome + "&email=" + email + "&senha=" + senha + "&telefone=" + telefone);
    }
  </script>-->
</body>
</html>








<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="shortcut icon" type="image/x-icon" href="../img/icones/todos/favicon.ico">
    <link rel="stylesheet" type="text/css" href="../estilos/estilo.css">
    <link href="../estilos/bootstrap-exemplos/assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .categoria-cloud {
          display: flex;
          flex-wrap: wrap;
          gap: 10px;
      }

      .categoria-btn {
          padding: 8px 16px;
          background-color: #f0f0f0;
          border: none;
          border-radius: 4px;
          cursor: pointer;
      }

      .categoria-btn.selected {
          background-color: #99ccff;
          color: white;
      }


      button[type="submit"] {
          margin-top: 10px;
          display: flex;
          flex-wrap: wrap;
          gap: 10px;
          padding: 8px 16px;
          background-color: royalblue;
          color:white;
          border: none;
          border-radius: 4px;
          cursor: pointer;
      }


  </style>
</head>
<body>
    <div class="container">
        <div class="form-group">
            <label for="categorias">
                <h1>Escolha as restrições das quais você se identifica</h1>
            </label>
            <div class="category-cloud">
              <div class="categoria-cloud">
                <?php
                        // Conexão com o banco de dados
                require_once "../conexao.php";
                        // Verificar a conexão
                if (!$conexao) {
                    die('Erro ao conectar ao banco de dados: ' . mysqli_connect_error());
                }

                        // Consulta para obter as categorias
                $sql = "SELECT cod, nome FROM categoria WHERE tipo = 'cliente'";
                $result = mysqli_query($conexao, $sql);

                        // Exibir as opções do select
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<button class="categoria-btn" data-categoria="'.$row['nome'].'" data-value="'.$row['cod'].'">+'.$row['nome'].'</button>';
                }

                        // Fechar a conexão com o banco de dados
                mysqli_close($conexao);
                ?>
            </div>
        </div>

        <form id="category-form" action="seu_backend.php" method="POST">
          <input type="hidden" id="selected-categories" name="selectedCategories" value="">
          <button type="submit">Enviar</button>
      </form>


      <script>
        // Selecionar/desselecionar categoria ao clicar
        document.addEventListener('click', function(event) {
          if (event.target.classList.contains('category-option')) {
            event.target.classList.toggle('selected');
        }
    });

// Armazenar categorias selecionadas em uma SESSION
        document.getElementById('category-form').addEventListener('submit', function(event) {
          event.preventDefault();
          var selectedCategories = Array.from(document.getElementsByClassName('category-option selected')).map(function(category) {
            return category.innerText;
        });
          document.getElementById('selected-categories').value = selectedCategories.join(', ');
          this.submit();
      });

  </script>

</body>
</html>
