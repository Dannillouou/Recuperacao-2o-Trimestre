<?php
  //codigo que verifica se há uma sessão em andamento sempre que as paginas do site são acessadas
  session_start();
  if(!isset($_SESSION['user']))
    header('Location: index.php?sessaoNaoIniciada=true');

  //Para quando houver redirecionamento para home depois do cadastro de uma ficha
  if (isset($_GET['fichaCadastrada'])) {
    $temMensagem = true;
    $mensagem = "Ficha cadastrada/atualizada com sucesso!";
  } 
?>

<!--Se divirta Hannah-->

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
    <h1>Pagina principal</h1>
    
    <!--h1 só existira se houver mensagem para ser impressa-->
    <?php if (isset($temMensagem)) echo "<h1>$mensagem</h1>" ?>

    <a href="logout.php">Fazer logout</a>
    <a href="cadastrarFicha.php">Cadastrar exercício em ficha</a>

</body>
</html>