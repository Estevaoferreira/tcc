<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="img/icones/todos/favicon.ico">
	<link href="estilos/bootstrap-exemplos/assets/dist/css/bootstrap.min.css" rel="stylesheet">
	<title>Cadastre-se</title>
	<style>
		body{
			background: linear-gradient(to right, green, greenyellow);
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

		input[type=text], input[type=email], input[type=password] {
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
	</style>
</head>
<body>
	<div class="register-form">
		<h1>Cadastro</h1>
		<form id="formulario" action="insere_usuario.php" method="POST">
			<label for="cpf">CPF:</label>
			<input type="text" id="cpf" name="cpf" maxlength="14" required>
			<label for="nome">Nome:</label>
			<input type="text" id="nome" name="nome" required>
			<label for="telefone">Telefone:</label>
			<input type="text" id="telefone" name="telefone" maxlength="15" 
			required>
			<label for="email">E-mail:</label>
			<input type="email" id="email" name="email" required>
			<label for="senha">Senha:</label>
			<input type="password" id="senha" name="senha" required>
			<label for="confirmaSenha">Confirme a senha:</label>
			<input type="password" id="confirmaSenha" name="confirmaSenha" required>
			<button type="submit">Enviar</button>
		</form>

		<script>
			function validarCPF(cpf) {
				cpf = cpf.replace(/[^\d]+/g,'');

				if (cpf.length !== 11) {
					return false;
				}

				if (/^(\d)\1+$/.test(cpf)) {
					return false;
				}

				var soma = 0;
				for (var i = 0; i < 9; i++) {
					soma += parseInt(cpf.charAt(i)) * (10 - i);
				}
				var resto = 11 - (soma % 11);
				var digito1 = (resto >= 10 ? 0 : resto);

				soma = 0;
				for (var i = 0; i < 10; i++) {
					soma += parseInt(cpf.charAt(i)) * (11 - i);
				}
				resto = 11 - (soma % 11);
				var digito2 = (resto >= 10 ? 0 : resto);

				if (digito1 !== parseInt(cpf.charAt(9)) || digito2 !== parseInt(cpf.charAt(10))) {
					return false;
				}

				return true;
			}

			var formulario = document.getElementById('formulario');
			formulario.addEventListener('submit', function(event) {
				var cpfInput = document.getElementById('cpf');
				var cpf = cpfInput.value;
				if (!validarCPF(cpf)) {
					alert('CPF inválido!');
					event.preventDefault();
				}

				var telefoneInput = document.getElementById('telefone');
				var telefone = telefoneInput.value;
				if (!/^\d{2}\d{9}$/.test(telefone)) {
					alert('Telefone inválido!');
					event.preventDefault();
				}

				var senhaInput = document.getElementById('senha');
				var confirmarSenhaInput = document.getElementById('confirmaSenha');
				var senha = senhaInput.value;
				var confirmarSenha = confirmarSenhaInput.value

				if (senha !== confirmarSenha) {
					alert('A senha e a confirmação de senha devem ser iguais!');
					event.preventDefault();
				}

				var emailInput = document.getElementById('email');
				var email = emailInput.value;
				if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
					alert('E-mail inválido!');
					event.preventDefault();
				}
			});
		</script>
	</body>
	</html>
	</html>