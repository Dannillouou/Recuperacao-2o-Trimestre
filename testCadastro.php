<?php
  require "models/Aluno.php";
  
  //função que verifica se o aluno ja nao existe no banco de dados
  function VerificaAlunoExistente(){
    include "partials/VerificaAlunoExistente.php";
  }

  //função que cadastra aluno caso esse não exista no banco de dados
  function CadastraAluno($arquivoAlunos, $dados){
    $alunoExiste = VerificaAlunoExistente($arquivoAlunos, $dados);

    if($alunoExiste)
      return false;
    else{
      //transformando o conteudo do arquivo em array
      $arquivoDecodificado = json_decode(file_get_contents($arquivoAlunos));
      $conteudoArquivo = $arquivoDecodificado;
      array($conteudoArquivo);
      //colocando novo aluno
      array_push($conteudoArquivo, $dados);
      //recodificando arquivo
      file_put_contents($arquivoAlunos, json_encode($conteudoArquivo, JSON_PRETTY_PRINT));
      
      return true;
    }
  }

  $novoAluno = new Aluno($_POST['nome'], $_POST['login'], $_POST['email'], $_POST['senha']);
  $alunoCadastrado = CadastraAluno("json/alunos.json", $novoAluno);

  if(!$alunoCadastrado)//se retornar falso o aluno ja foi cadastrado
    header('Location: index.php?alunoJaCadastrado=true');
  else
    header('Location: index.php?alunoCadastrado=true');
?>