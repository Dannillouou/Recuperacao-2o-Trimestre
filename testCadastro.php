<?php
  require "models/Usuario.php";
  
  //função que verifica se usuario ja nao existe no banco de dados
  function VerificaUsuarioExistente(){
    include "partials/VerificaUsuarioExistente.php";
  }

  //função que cadastra usuario caso esse não exista no banco de dados
  function CadastraUsuario($arquivoUsuarios, $dados){
    $usuarioExiste = VerificaUsuarioExistente($arquivoUsuarios, $dados);

    if($usuarioExiste)
      return false;
    else{
      //transformando o conteudo do arquivo em array
      $arquivoDecodificado = json_decode(file_get_contents($arquivoUsuarios));
      $conteudoArquivo = $arquivoDecodificado;
      array($conteudoArquivo);
      //colocando novo usuario
      array_push($conteudoArquivo, $dados);
      echo($conteudoArquivo);
      //recodificando arquivo
      file_put_contents($arquivoUsuarios, json_encode($conteudoArquivo, JSON_PRETTY_PRINT));
      
      return true;
    }
  }

  $novoUsuario = new Usuario($_POST['nome'], $_POST['login'], $_POST['email'], $_POST['senha']);
  $usuarioCadastrado = CadastraUsuario("json/usuarios.json", $novoUsuario);

  if(!$usuarioCadastrado)//se retornar falso o usuario ja foi cadastrado
    header('Location: index.php?usuarioJaCadastrado=true');
  else
    header('Location: index.php?usuarioCadastrado=true');
?>