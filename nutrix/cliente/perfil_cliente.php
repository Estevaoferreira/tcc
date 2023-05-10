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
    form > button {
      background-color: #4CAF50;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    form >  button:hover {
      background-color: #3e8e41;
    }
    form > button {
      padding: 8px 16px;
      font-size: 16px;
    }

    /* Estilo para o link de logout */
    
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
   body > button{
    background-color: #3e8e41;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    position: fixed;
    bottom: 15%;
    right: 0;
    margin: 20px;
  }
  body > button:hover{
    background-color: red;
  }
  body > button > a{
    color: white;
    text-decoration: none;
  }
  body > button > a:hover{
    color: white;
    border: none;
    text-shadow: none;
    text-decoration: underline;
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
 <?php
 require_once "../conexao.php";
 session_start();

 $cpf = $_SESSION['cpf'];


 $sql = "SELECT * FROM cliente WHERE cpf = ".$cpf;
 $resultado = $conexao->query($sql);

 if ($resultado->num_rows > 0) {
  // Pega o primeiro resultado
  $linha = $resultado->fetch_assoc();
  // Define a variável $nome
  $nome = $linha["nome"];
  $cpf = $linha["cpf"];
  $telefone = $linha["telefone"];
  $email = $linha["email"];

} else {
  echo "Nenhum resultado encontrado.";
}
echo "<script>
   function sucesso() {
     alert('Alteração realizada com sucesso!');
     window.location.href = 'dashboard.php';
   }
   function erro() {
     alert('Falha na alteração dos dados, tente novamente!');
      window.location.href = 'perfil_cliente.php';
   }
 </script>";
if (isset($_SESSION['alteracao_dados_cliente']) && $_SESSION['alteracao_dados_cliente'] == "sucesso") {
  echo "<script>sucesso();</script>";
  /*sleep(3);
  unset($_SESSION['alteracao_dados_cliente']);
  header("Location: dashboard.php");*/
}elseif (isset($_SESSION['alteracao_dados_cliente']) && $_SESSION['alteracao_dados_cliente'] == "erro") {
  echo "<script>erro();</script>";
  //sleep(3);
  unset($_SESSION['alteracao_dados_cliente']);
    header("Location: dashboard.php");
}
?>

<form action="update_cliente.php" method="POST">
 <label for="cpf">CPF:</label>
 <input type="text" id="cpf" name="cpf" value="<?php echo $cpf; ?>" disabled>
 <br>
 <label for="telefone">Telefone:</label>
 <input type="text" id="telefone" name="telefone" value="<?php echo $telefone; ?>">

 <label for="nome">Nome:</label>
 <input type="text" id="nome" name="nome" value="<?php echo $nome; ?>">

 <label for="email">E-mail:</label>
 <input type="text" id="email" name="email" value="<?php echo $email; ?>">

 <!--<label for="senha">Senha:</label>
   <input type="password" id="senha" name="senha" value="<?php// echo $nome; ?>" disabled>-->

   <button type="submit">Enviar</button>
 </form>
 <button atributo="botao-logoff"><a href="fecha_sessao.php" class="logout">Encerrar sessão</a></button>
</body>
</html>
