<?php
  // Inicia a sessão
  session_start();

  // Limpa os dados da sessão
  session_unset();

  // Destrói a sessão
  session_destroy();
  header("Location: index.php");
?>