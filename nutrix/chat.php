<!DOCTYPE html>
<html>
<head>
  <title>Chat</title>

</head>
<body>
  <div id="chat"></div>
  <!-- Formulário para envio de mensagens -->
  <form action="enviar_mensagem.php" method="POST">
    <div class="mb-3">
      <label for="usuario" class="form-label">Usuário:</label>
      <input type="text" class="form-control" id="usuario" name="usuario" required>
    </div>
    <div class="mb-3">
      <label for="mensagem" class="form-label">Mensagem:</label>
      <textarea class="form-control" id="mensagem" name="mensagem" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
  </form>



</body>
</html>
