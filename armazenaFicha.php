<!-- Por algum motivo, as verificações não funcionaram como o esperado e não foi possível impedir o usuário de inserir duas fichas com os mesmos
identificadores (identificadorFicha e aluno) -->
<?php
    session_start();
    
    function ArmezenarFicha($arquivoFichas, $dados){
        //decodificando e transformando conteudo do arquivo em array
        $arquivoDecodificado = json_decode(file_get_contents($arquivoFichas));
        $conteudoArquivo = $arquivoDecodificado;
        //adicionando ficha no arquivo
        array($conteudoArquivo);
        array_push($conteudoArquivo, $dados);
        file_put_contents($arquivoFichas, json_encode($conteudoArquivo, JSON_PRETTY_PRINT));
    }

    function VerificaFichaNoArquivo($arquivoFichas, $ficha){
        $arquivoDecodificado = json_decode(file_get_contents($arquivoFichas));

        if(!isset($arquivoDecodificado)){
            return false;
        }

        foreach($arquivoDecodificado as $fichaArquivo){
            if($fichaArquivo->identificadorFicha == $ficha->identificadorFicha && $fichaArquivo->aluno == $ficha->aluno){
                return true;
            }
        }

        return false;
    }
    
    $fichaExisteNoArquivo = VerificaFichaNoArquivo("json/fichas.json", $_SESSION['fichaAtual']);
    
    if(!$fichaExisteNoArquivo){
        //A ficha é toda salva no vetor global sessions e depois adicionada no arquivo
        ArmezenarFicha("json/fichas.json", $_SESSION['fichaAtual']);

        header('Location: home.php?fichaCadastrada=true');
    }
    else{
        header('Location: home.php?fichaJaCadastrada=true');
    }
?>