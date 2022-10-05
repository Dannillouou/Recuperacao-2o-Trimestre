    //transformando conteudo do arquivo em array
    $arquivoAlunos = json_decode(file_get_contents($arquivoAlunos));

    //verificando para cada item do arquivo se o login e a senha batem
    //o que importa nesse sistema são o login e a senha e por isso podem haver dois usuários
    //com o mesmo nome mas logins diferentes
    foreach($arquivoAlunos as $aluno){
      if(($aluno->login == $dados->login) && ($aluno->senha == $dados->senha))
        return true;
    }

    return false;