<?php
  
  //codigo que verifica se há uma sessão em andamento sempre que as paginas do site são acessadas
  session_start();
  if(!isset($_SESSION['user'])){
    header('Location: index.php?sessaoNaoIniciada=true');
  }
  
  if(isset($_GET['exercicioCadastrado'])){
    $temMensagem = true;
    $mensagem[0] = "Exercício cadastrado com sucesso!";
    $mensagem[1] = "Ainda há uma ficha em aberto!";
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hanniel gym</title>
</head>
<body>
  
  <!--h1 só existira se houver mensagem para ser impressa-->
  <?php
   if (isset($temMensagem)){
    echo "<h1>$mensagem[0]</h1>";
    echo "<br>";
    echo "<h1>$mensagem[1]</h1>";
   }
  ?>

  <form action="armazenarNaFicha.php" method="post">
    <label for="ficha">Nome da ficha</label>
    <input type="text" name="ficha" required>
    <label for="nomeExercicio">Nome do exercicio</label>
    <input type="text" name="nomeExercicio" required>
    <label for="musculo">Grupo muscular exercitado</label>
    <input type="text" name="musculo" required>
    <label for="carga">Carga (kg)</label>
    <input type="number" name="carga" required>
    <label for="repeticoes">Número de repetições</label>
    <input type="number" name="repeticoes" required>
    <label for="series">Número de séries</label>
    <input type="number" name="series" required>
    <label for="series">Tempo de descanso (segundos)</label>
    <input type="number" name="descanso" required>
    <input type="submit" value="Cadastrar exercício na ficha">
  </form>

  <form action="armazenaFicha.php" method>
    <input type="submit" value="Cadastrar ficha">
  </form>
</body>
</html>