<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Entre</title>
	<link rel="shortcut icon" type="image/x-icon" href="img/icones/todos/favicon.ico">
	<link href="estilos/bootstrap-exemplos/assets/dist/css/bootstrap.min.css" rel="stylesheet">
	<style>
		body{
			background: linear-gradient(to right, green, greenyellow);
		}

		.login-form {
			width: 300px;
			display: block;
			margin: 0 auto;
			margin-top: 15rem;
			background-color: #fff;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
		}

		h1 {
			text-align: center;
		}

		input[type=text], input[type=password] {
			width: 100%;
			padding: 10px;
			margin: 5px 0 15px 0;
			border: none;
			border-radius: 5px;
			background-color: #f2f2f2;
		}

		button[type=button] {
			width: 100%;
			padding: 10px;
			border: none;
			border-radius: 5px;
			background-color: #4CAF50;
			color: #fff;
			font-size: 16px;
			cursor: pointer;
		}

		button[type=button]:hover {
			background-color: #45a049;
		}
	</style>
</head>
<body>
	<div class="login-form">
		<h1>Login</h1>
		<form>
			<input type="text" placeholder="Usuário" id="username">
			<input type="password" placeholder="Senha" id="password">
			<button type="button" onclick="login()">Entrar</button>
		</form>
		
		<script>
			function login() {
        // obter os valores do usuário e senha inseridos
				var username = document.getElementById("username").value;
				var password = document.getElementById("password").value;

        // enviar dados para o servidor
				var xhr = new XMLHttpRequest();
				xhr.open("POST", "valida_login.php", true);
				xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				xhr.onreadystatechange = function() {
					if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            // resposta do servidor
						var response = this.responseText;
						if (response === "OK") {
              // redirecionar para a página de perfil
							window.location.href = "perfil.html";
						} else {
              // exibir mensagem de erro
							alert("Login inválido. Tente novamente.");
						}
					}
				};
				xhr.send("username=" + username + "&password=" + password);
			}
		</script>
	</div>
</body>
</html>