<?php

    function VerificaLogin($nomeArquivo, $login, $senha){
        $arquivoUsuarios = json_decode(file_get_contents($nomeArquivo));

        if(!isset($arquivoUsuarios)){
            header('Location: index.php?nenhumUsuario=true');
        }

        foreach($arquivoUsuarios as $usuario){
            if($usuario->senha == $senha && $usuario->login == $login)
                return TRUE;
            else if($usuario->senha == $senha && $usuario->login != $login)
                header('Location: index.php?loginInvalido=true');
            else if($usuario->senha != $senha && $usuario->login == $login)
                header('Location: index.php?senhaInvalida=true');
            else
                header('Location: index.php?senhaELoginInvalidos=true');
        }
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        session_start();

        if(VerificaLogin('json/usuarios.json', $_POST['login'], $_POST['senha'])){
            //salvando usuario para usar enquanto durar a sessão
            $_SESSION["user"] = $_POST["login"];
            header("Location: home.php");
        }
    }
