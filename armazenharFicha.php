<?php
    //requerindo classes necessárias
    require "models/Exercicio.php";
    require "models/Ficha.php";

    //Iniciar sessão para poder saber qual o usuário atual
    session_start();
    $alunoAtual = $_SESSION['user'];
    
    $arquivoFichas = "json/fichas.json";
    $arquivoDecodificado = json_decode(file_get_contents($arquivoFichas));

    function VerificaExistenciaFicha($arquivoDecodificado, $identificadorFicha, $aluno){
      if(!isset($arquivoDecodificado)) return true;

      //não podem haver duas fichas com os mesmos identificadores/nomes e mesmo aluno
      foreach($arquivoDecodificado as $ficha){
        if($ficha->identificadorFicha == $identificadorFicha && $ficha->aluno == $aluno) return true;
      }

      return false;
    }

    function ArmezenarFicha($arquivoFichas, $dados){
      //decodificando e transformando conteudo do arquivo em array
      $arquivoDecodificado = json_decode(file_get_contents($arquivoFichas));
      $conteudoArquivo = $arquivoDecodificado;
      array($conteudoArquivo);
      //adicionando ficha no arquivo
      array($conteudoArquivo);
      array_push($conteudoArquivo, $dados);
      file_put_contents($arquivoFichas, json_encode($conteudoArquivo, JSON_PRETTY_PRINT));
    }

    //Informações sobre o exercício
    $nomeExercicio = $_GET['nomeExercicio'];
    $grupoMuscular = $_GET['musculo'];
    $carga = $_GET['carga'];
    $repeticoes = $_GET['repeticoes'];
    $series = $_GET['series'];
    
    $novoExercicio = new Exercicio($nomeExercicio, $grupoMuscular, $carga, $repeticoes, $series);

    //Informações sobre a ficha
    $identificadorFicha = $_GET['ficha'];

    //Verificando se a ficha já não existe
    $fichaExiste = VerificaExistenciaFicha($arquivoDecodificado, $identificadorFicha, $alunoAtual);

    if($fichaExiste){
      $conteudoArquivo = $arquivoDecodificado;
      array($conteudoArquivo);
      foreach($conteudoArquivo as $ficha){
        if($ficha->identificadorFicha == $identificadorFicha && $ficha->aluno == $alunoAtual) $fichaAtual = $ficha;
      }
    }
    else{
      $fichaAtual = new Ficha($identificadorFicha, $alunoAtual);
    }

    //colocar exercicio na ficha
    array_push($fichaAtual->exercicios, $novoExercicio);
    $fichaAtual->numeroExercicios += 1;

    ArmezenarFicha($arquivoFichas, $fichaAtual);
    
    header('Location cadastrarFicha.php?exercicioCadastrado=true');
?>