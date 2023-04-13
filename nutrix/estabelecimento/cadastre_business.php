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
		div img{
			margin-top: 200px;
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

		input[type=text], input[type=number], input[type=email], input[type=password], .select{
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
		.home-icon {
			position: fixed;
			top: 20px;
			left: 20px;
			font-size: 30px;
			color: #000;
			text-decoration: none;
		}
		.header {
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			z-index: 999;
			background: red;
		}
	</style>
</head>
<body>
	<header>
		<a href="index.php" class="home-icon">
			<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16" style="transform: scale(1.4); color: white;">
				<path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z"/>
				<path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z"/>
			</svg>
		</a>
	</header>
	<div class="register-form">
		<h1>Cadastro</h1>
		<form id="formulario" action="insere_estabelecimento.php" method="POST">
			<label for="cnpj">CNPJ:</label>
			<input type="text" id="cnpj" name="cnpj" maxlength="14" required>

			<label for="nome">Nome da empresa:</label>
			<input type="text" id="nome" name="nome" required>

			<label for="telefone">Telefone de WhatsApp:</label>
			<input type="text" id="telefone" name="telefone" maxlength="15" 
			required>

			<label for="email">E-mail empresarial:</label>
			<input type="email" id="email" name="email" required>

			<label for="senha">Senha:</label>
			<input type="password" id="senha" name="senha" required>

			<label for="confirmaSenha">Confirme a senha:</label>
			<input type="password" id="confirmaSenha" name="confirmaSenha" required>

			<label for="estado">Estado:</label>
			<select class="select" id="estado" name="estado" required>
				<option value="" selected disabled>Selecione um estado</option>
				<option value="AC">Acre</option>
				<option value="AL">Alagoas</option>
				<option value="AP">Amapá</option>
				<option value="AM">Amazonas</option>
				<option value="BA">Bahia</option>
				<option value="CE">Ceará</option>
				<option value="DF">Distrito Federal</option>
				<option value="ES">Espírito Santo</option>
				<option value="GO">Goiás</option>
				<option value="MA">Maranhão</option>
				<option value="MT">Mato Grosso</option>
				<option value="MS">Mato Grosso do Sul</option>
				<option value="MG">Minas Gerais</option>
				<option value="PA">Pará</option>
				<option value="PB">Paraíba</option>
				<option value="PR">Paraná</option>
				<option value="PE">Pernambuco</option>
				<option value="PI">Piauí</option>
				<option value="RJ">Rio de Janeiro</option>
				<option value="RN">Rio Grande do Norte</option>
				<option value="RS">Rio Grande do Sul</option>
				<option value="RO">Rondônia</option>
				<option value="RR">Roraima</option>
				<option value="SC">Santa Catarina</option>
				<option value="SP">São Paulo</option>
				<option value="SE">Sergipe</option>
				<option value="TO">Tocantins</option>
			</select>

			<label for="cidade">Cidade:</label>
			<input type="text" id="cidade" name="cidade" required>

			<label for="bairro">Bairro:</label>
			<input type="text" id="bairro" name="bairro" required>

			<label for="logradouro">Logradouro:</label>
			<input type="text" id="logradouro" name="logradouro" required>



			<label for="cep">CEP:</label>
			<input type="number" id="cep" name="cep" pattern="[0-9]{8}" required>

			<label for="numero">Número:</label>
			<input type="number" id="numero" name="numero" required>

			<label for="complemento">Complemento:</label>
			<input type="text" id="complemento" name="complemento">
			<button type="submit">Enviar</button>
		</form>
	</div>
	<script>
		function validarCNPJ(cnpj) {
			cnpj = cnpj.replace(/[^\d]+/g,'');

			if (cnpj.length !== 14) {
				return false;
			}

			if (/^(\d)\1+$/.test(cnpj)) {
				return false;
			}

			var tamanho = cnpj.length - 2;
			var numeros = cnpj.substring(0,tamanho);
			var digitos = cnpj.substring(tamanho);
			var soma = 0;
			var pos = tamanho - 7;

			for (var i = tamanho; i >= 1; i--) {
				soma += numeros.charAt(tamanho - i) * pos--;
				if (pos < 2) {
					pos = 9;
				}
			}

			var resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
			if (resultado != digitos.charAt(0)) {
				return false;
			}

			tamanho = tamanho + 1;
			numeros = cnpj.substring(0,tamanho);
			soma = 0;
			pos = tamanho - 7;

			for (var i = tamanho; i >= 1; i--) {
				soma += numeros.charAt(tamanho - i) * pos--;
				if (pos < 2) {
					pos = 9;
				}
			}

			resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
			if (resultado != digitos.charAt(1)) {
				return false;
			}

			return true;
		}


		var formulario = document.getElementById('formulario');
		formulario.addEventListener('submit', function(event) {
			var cnpjInput = document.getElementById('cnpj');
			var cnpj = cnpjInput.value;
			if (!validarCNPJ(cnpj)) {
				alert('CNPJ inválido!');
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