<?php

  //não consegui incluir de alguma forma essa verificação
  //em formato de função dentro de um partial para organizar,
  //não encontrei uma forma de fazer isso que funcionasse
  session_start();
  if(isset($_SESSION['user']))
    header('Location: home.php');

  //Mensagens de aviso/notificação no caso de erro ou de usuário ja cadastrado
  if (isset($_GET['alunoJaCadastrado'])) {
    $temMensagem = true;
    $mensagem = "Aluno já cadastrado";
  } 
  else if (isset($_GET['alunoCadastrado'])) {
    $temMensagem = true;
    $mensagem = "Aluno cadastrado com sucesso!";
  }
  else if (isset($_GET['loginInvalido'])) {
    $temMensagem = true;
    $mensagem = "Login invalido!";
  }
  else if (isset($_GET['alunoInvalido'])) {
    $temMensagem = true;
    $mensagem = "Aluno Invalido!";
  }
  else if (isset($_GET['senhaELoginInvalidos'])) {
    $temMensagem = true;
    $mensagem = "Senha e login Inválidos!";
  }
  else if(isset($_GET['desconectado'])){
    $temMensagem = true;
    $mensagem = "Desconectado com sucesso";
  }
  else if(isset($_GET['sessaoNaoIniciada'])){
    $temMensagem = true;
    $mensagem = "Sessão ainda não iniciada";
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
    <?php if (isset($temMensagem)) echo "<h1>$mensagem</h1>" ?>

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