<?php
session_start();
include "../conexao.php";

if(isset($_POST["email"]) && isset($_POST["senha"])) {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $query = "SELECT senha, nome, cpf FROM cliente WHERE email = ?";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($senha_criptografada, $nome, $cpf);
        $stmt->fetch();


        if (password_verify($senha, $senha_criptografada)) {
            // A senha fornecida pelo usuário corresponde à senha criptografada armazenada
            // Faça o login do usuário aqui
            $_SESSION['cpf'] = $cpf;
            header("Location: dashboard.php");
            exit();
        } else {
            // A senha fornecida pelo usuário não corresponde à senha criptografada armazenada
            // Exiba uma mensagem de erro ou redirecione o usuário para a página de login
            $_SESSION['login_erro'] = "senha_errada";
               header("Location: entre.php");
            exit();
        }
    } else {
        // O usuário não existe no banco de dados
        // Exiba uma mensagem de erro ou redirecione o usuário para a página de registro
        $_SESSION['login_erro'] = "usuario_nao_existe";
        header("Location: cadastre.php");
        exit();
    }
}
?>
