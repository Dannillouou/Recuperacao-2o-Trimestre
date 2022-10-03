<?php
  require "./models/Usuario.php";
  
  //função que verifica se usuario ja nao existe no banco de dados
  function VerificaUsuarioExistente($arquivoUsuarios, $login, $senha){

    //transformando conteudo do arquivo em array
    $arquivoUsuarios = json_decode("./models/usuarios.json");
    array($arquivoUsuarios);

    if(!isset($arquivoUsuarios)){
      return false;
    }

    foreach($arquivoUsuarios as $usuario){
      if(($usuario->login == $login) && ($usuario->senha == $senha))
        header('Location: index.php?usuarioJaCadastrado=true');
    }

    return false;
  }

  //função que cadastra usuario caso esse não exista no banco de dados
  function cadastraUsuario($arquivoUsuarios, $nome, $login, $email, $senha){
    $usuarioExiste = VerificaUsuarioExistente($arquivoUsuarios, $login, $senha);

    if($usuarioExiste)
      return false;
    else{ //se o usuario existir foi feito o cadastro com sucesso

      //criando objeto
      $novoUsuario = new Usuario($nome, $login, $email, $senha);
      //transformando o conteudo do arquivo em array
      $conteudoArquivo = $arquivoUsuarios;
      array($conteudoArquivo);
      //colocando novo usuario
      array_push($conteudoArquivo, $novoUsuario);
      //recodificando arquivo
      $arquivoUsuarios = file_put_contents($arquivoUsuarios, json_encode($conteudoArquivo, JSON_PRETTY_PRINT));
      
      return true;
    }
  }

  $usuarioCadastrado = cadastraUsuario("./json/usuarios.json", $_POST['nome'], $_POST['login'], $_POST['email'], $_POST['senha']);

  if(!$usuarioCadastrado)//se retornar falso o usuario ja foi cadastrado
    header('Location: index.php?usuarioJaCadastrado=true');
  else
    header('Location: index.php?usuarioCadastrado=true');
?>