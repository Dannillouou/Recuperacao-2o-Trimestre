<?php
  
  if(!isset($_POST['exercicioCadastrado'])){
    $temMensagem = true;
    $mensagem = "Aluno já cadastrado";
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
  <!--h1 só existira se houver mensagem para ser impressa-->
  <?php if (isset($temMensagem)) echo "<h1>$mensagem</h1>" ?>

  <form action="armazenarFicha.php" method="post">
    <label for="ficha">Nome da ficha</label>
    <input type="text" name="ficha">
    <label for="nomeExercicio">Nome do exercicio</label>
    <input type="text" name="nomeExercicio">
    <label for="musculo">Grupo muscular exercitado</label>
    <input type="text" name="musculo">
    <label for="carga">Carga (kg)</label>
    <input type="number" name="carga">
    <label for="repeticoes">Número de repetições</label>
    <input type="number" name="repeticoes">
    <label for="series">Número de séries</label>
    <input type="number" name="series">
    <input type="submit" value="Cadastrar ficha">
  </form>

  <a href="home.php?fichaCadastrada=true">Terminar cadastro na ficha</a>
</body>
</html>