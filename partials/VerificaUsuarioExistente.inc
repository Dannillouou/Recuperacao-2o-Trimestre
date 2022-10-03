    //transformando conteudo do arquivo em array
    $arquivoUsuarios = json_decode(file_get_contents($arquivoUsuarios));

    foreach($arquivoUsuarios as $usuario){
      if(($usuario->login == $dados->login) && ($usuario->senha == $dados->senha))
        return true;
    }

    return false;