<?php

  // Professor, como ficamos muito tempo para conseguir fazer a estrutura de armazenamento das
  // fichas funcionar, não conseguimos fazer a barra de pesquisa. Espero que isso não desconte muito
  // dos pontos, pois toda a matéria dada no segundo trimestre fomos capazes de aprender e usar
  // muito bem, ao meu ver

  session_start();
  if(isset($_SESSION['user']))
    header('Location: home.php');

  //Mensagens de aviso/notificação no caso de erro ou de usuário ja cadastrado
  // Escolhemos fazer dessa forma, com parâmetros GET para evitar a criação de várias páginas php so com o intuito de passar um aviso para o 
  // usuário
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

    <title>Hanniel gym</title>
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