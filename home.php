<?php
  //codigo que verifica se há uma sessão em andamento sempre que as paginas do site são acessadas, se não houver, redireciona o usuário para a página
  //inicial
  session_start();
  if(!isset($_SESSION['user']))
    header('Location: index.php?sessaoNaoIniciada=true');

  //limpando a variavel ficha atual para ser usada novamente
  unset($_SESSION['fichaAtual']);

  //Para quando houver redirecionamento para home depois da tentativa de cadastro de uma ficha
  if (isset($_GET['fichaCadastrada'])) {
    $temMensagem = true;
    $mensagem = "Ficha cadastrada/atualizada com sucesso!";
  }
  if (isset($_GET['fichaJaCadastrada'])) {
    $temMensagem = true;
    $mensagem = "Ficha já existe no sistema!";
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
    <h1>Pagina principal</h1>
    <br>
    
    <!--h1 só existira se houver mensagem para ser impressa-->
    <?php if (isset($temMensagem)) echo "<h1>$mensagem</h1>" ?>

    <br>
    <a href="logout.php">Fazer logout</a>
    <br>
    <a href="cadastrarFicha.php">Cadastrar ficha</a>
    <br>

    <?php
      $arquivoDecodificado = json_decode(file_get_contents("json/fichas.json"));
      $conteudoArquivo = $arquivoDecodificado;
      array($conteudoArquivo);

      foreach($conteudoArquivo as $ficha){
        if($ficha->aluno == $_SESSION['user']){
          echo "<div class=\"ficha\">";
          echo "$ficha->identificadorFicha";
          foreach($ficha->exercicios as $exercicio){
            echo "<div class=\"exercicio\">";
            echo "$exercicio->nomeExercicio";
            echo "$exercicio->grupoMuscular";
            echo "$exercicio->carga";
            echo "$exercicio->repeticoes";
            echo "$exercicio->series";
            echo "$exercicio->descanso";
            echo "</div>";
          }
          echo "</div>";
          echo "<br>"; 
        }
      }
    ?>

</body>
</html>