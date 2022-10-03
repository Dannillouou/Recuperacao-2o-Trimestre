<?php
  
  //Mensagens de aviso no caso de erro ou de usuário ja cadastrado
  if(isset($_GET['usuarioJaCadastrado'])){
    $erro = true;
    $mensagemDeErro = "Usuario já cadastrado";
  }
  else if(isset($_GET['usuarioCadastrado'])){
    $erro = true;
    $mensagemDeErro = "Usuario cadastrado com sucesso!";
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

  <?php if(isset($erro)) echo "<h1 class=\"mensagemErroLogin\">$mensagemDeErro</h1>"?>

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