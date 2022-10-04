<?php

  //Mensagens de aviso/notificação no caso de erro ou de usuário ja cadastrado
  if (isset($_GET['usuarioJaCadastrado'])) {
    $temMensagem = true;
    $mensagem = "Usuario já cadastrado";
  } 
  else if (isset($_GET['usuarioCadastrado'])) {
    $temMensagem = true;
    $mensagem = "Usuario cadastrado com sucesso!";
  }
  else if (isset($_GET['loginInvalido'])) {
    $temMensagem = true;
    $mensagem = "Login invalido!";
  }
  else if (isset($_GET['usuarioInvalido'])) {
    $temMensagem = true;
    $mensagem = "Usuario Invalido!";
  }
  else if (isset($_GET['senhaELoginInvalidos'])) {
    $temMensagem = true;
    $mensagem = "Senha e login Inválidos!";
  }
  else if(isset($_GET['desconectado'])){
    $temMensagem = true;
    $mensagem = "Desconectado com sucesso";
  }
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="style.css">

    <title>GRANDAO academia</title>
  </head>

  <body>

    <!--h1 só existira se houver mensagem para ser impressa-->
    <?php if (isset($temMensagem)) echo "<h1 class=\"mensagemErroLogin\">$mensagem</h1>" ?>

    <form action="login.php" method="post">

      <label for="login">Login</label>
      <input type="text" name="login">
      <label for="senha">Senha</label>
      <input type="password" name="senha">
      <input type="submit" value="Login">

    </form>

    <form action="cadastrar.php" method="get">

      <input type="submit" value="Cadatre-se">

    </form>
  </body>

</html>