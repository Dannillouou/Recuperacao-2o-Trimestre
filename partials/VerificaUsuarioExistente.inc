    //transformando conteudo do arquivo em array
    $arquivoUsuarios = json_decode(file_get_contents($arquivoUsuarios));

    //verificando para cada item do arquivo se o login e a senha batem
    //o que importa nesse sistema são o login e a senha e por isso podem haver dois usuários
    //com o mesmo nome mas logins diferentes
    foreach($arquivoUsuarios as $usuario){
      if(($usuario->login == $dados->login) && ($usuario->senha == $dados->senha))
        return true;
    }

    return false;