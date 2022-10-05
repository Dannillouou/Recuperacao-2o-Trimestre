<?php

    function VerificaLogin($nomeArquivo, $login, $senha){
        $arquivoAlunos = json_decode(file_get_contents($nomeArquivo));

        if(!isset($arquivoAlunos)){
            header('Location: index.php?nenhumAluno=true');
        }

        foreach($arquivoAlunos as $aluno){
            if($aluno->senha == $senha && $aluno->login == $login)
                return TRUE;
            else if($aluno->senha == $senha && $aluno->login != $login)
                header('Location: index.php?loginInvalido=true');
            else if($aluno->senha != $senha && $aluno->login == $login)
                header('Location: index.php?senhaInvalida=true');
            else
                header('Location: index.php?senhaELoginInvalidos=true');
        }
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        session_start();

        if(VerificaLogin('json/alunos.json', $_POST['login'], $_POST['senha'])){
            //salvando aluno para usar enquanto durar a sessão
            $_SESSION["user"] = $_POST["login"];
            header("Location: home.php");
        }
    }
