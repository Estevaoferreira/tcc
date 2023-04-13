<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Entre</title>
	<link rel="shortcut icon" type="image/x-icon" href="../img/icones/todos/favicon.ico">
	<link rel="stylesheet" type="text/css" href="../estilos/estilo.css">
	<link href="../estilos/bootstrap-exemplos/assets/dist/css/bootstrap.min.css" rel="stylesheet">	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
	<style type="text/css">
		body{
			background: linear-gradient(to right, green, greenyellow);
			font-family: 'Roboto', sans-serif;
		}
		div img{
			margin-top: 200px;
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
	<a href="home.php" class="home-icon">
		<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16" style="transform: scale(1.4); color: white;">
			<path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z"/>
			<path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z"/>
		</svg>
	</a>

	<div class="login-form">
		<h1>Login</h1>
		<form action="valida_login.php" method="POST">
			<input type="text" placeholder="email" name="email" id="username" required>
			<input type="password" placeholder="senha" name="senha" id="senha" required>
			<button type="submit" value="Entrar">Entrar</button>
		</form>
	</div>
</body>
</html>