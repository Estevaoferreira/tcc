<?php
// estabelece a conexão com o banco de dados
require_once "../conexao.php";

// obtém os valores do CPF, nome, telefone, e-mail e senha do formulário
echo "<br>".$cnpj            = $_POST["cnpj"];
echo "<br>".$nome           = $_POST["nome"];
echo "<br>".$telefone       = $_POST["telefone"];
echo "<br>".$email          = $_POST["email"];
echo "<br>".$senha          = $_POST['senha'];
echo "<br>".$estado         = $_POST["estado"];
echo "<br>".$cidade         = $_POST['cidade'];
echo "<br>".$bairro         = $_POST['bairro'];
echo "<br>".$logradouro     = $_POST['logradouro'];
echo "<br>".$cep            = $_POST['cep'];
echo "<br>".$numero         = $_POST['numero'];
echo "<br>".$complemento    = $_POST['complemento'];

// Gera um hash seguro para a senha
$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

// cria a instrução SQL INSERT
// Insere um novo registro na tabela "cliente"
$sql = "INSERT INTO estabelecimento 
 (cnpj, nome, telefone, email, senha, estado, cidade, bairro, logradouro, cep, numero, complemento) VALUES          
('$cnpj', '$nome', '$telefone', '$email', '$senha_hash', '$estado', '$cidade', '$bairro', '$logradouro', '$cep', '$numero', '$complemento')";
var_dump($sql);

if (mysqli_query($conexao, $sql)) {
    echo "Novo cliente adicionado com sucesso!";
    $_SESSION['cnpj'] = $cnpj;
    $_SESSION['login'] = true;
    header("Location: dashboard_estabelecimento.php");
    exit();
} else {
    echo "Erro ao adicionar novo cliente: " . mysqli_error($conexao);
}

// Fecha a conexão com o banco de dados
mysqli_close($conexao);
?>
