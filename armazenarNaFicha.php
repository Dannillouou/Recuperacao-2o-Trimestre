<!-- Nesse sistema, o usuário insere um exercício de cada vez na pagina "cadastrarficha.php" e fez um request para armazenar
esse exercício no vetor global session, de onde a ficha irá, depois, que todos os exercícios forem adicionados a ela, para o arquivo json -->

<?php
    //requerindo classes necessárias
    require "models/Exercicio.php";
    require "models/Ficha.php";

    //Iniciar sessão para poder saber qual o usuário atual
    session_start();
    $alunoAtual = $_SESSION['user'];
    
    $arquivoFichas = "json/fichas.json";
    $arquivoDecodificado = json_decode(file_get_contents($arquivoFichas));

    $identificadorFicha = $_POST['ficha'];

    //Verificando se estão sendo colocados mais de um exercício na mesma ficha ou se está se tratando de outra ficha
    if($identificadorFicha != $_SESSION['fichaAtual']->identificadorFicha){
      unset($_SESSION['fichaAtual']);
      $_SESSION['fichaAtual'] = new Ficha($identificadorFicha, $_SESSION['user']);
    }

    //Informações sobre o exercício
    $nomeExercicio = $_POST['nomeExercicio'];
    $grupoMuscular = $_POST['musculo'];
    $carga = $_POST['carga'];
    $repeticoes = $_POST['repeticoes'];
    $series = $_POST['series'];
    $tempoDescanso = $_POST['descanso'];
    
    //criando exercicio que sera colocado na ficha
    $novoExercicio = new Exercicio($nomeExercicio, $grupoMuscular, $carga, $repeticoes, $series, $tempoDescanso);

    //Informações sobre a ficha
    $_SESSION['fichaAtual']->identficadorFicha = $identificadorFicha;
    $_SESSION['fichaAtual']->aluno = $_SESSION['user'];

    //Aumentar o número de exercícios na ficha
    $_SESSION['fichaAtual']->numeroExercicios++;

    //Ao fim do preenchimento dos exercícios toda a ficha é inserida no arquivo
    array_push($_SESSION['fichaAtual']->exercicios, $novoExercicio);
    $nomeFichaAtual = $_SESSION['fichaAtual'];

    //Voltando para a página de cadastro para que possam ser colocados mais exercícios na ficha
    header('Location: cadastrarFicha.php?exercicioCadastrado=true');
?>