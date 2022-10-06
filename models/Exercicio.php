<?php 

// Assim como em uma academia, o exercício tem seu nome, carga, número de
// repetições, de séries e tempo de descanso. Eu decidi adicionar também a 
// informação do grupo muscular exercitado, para que o aluno possa ter uma
// noção melhor de como o exercício deve ser feito.

class Exercicio{
  var $nomeExercicio;
  var $grupoMuscular;
  var $carga;
  var $repeticoes;
  var $series;
  var $descanso;

  function __construct($nomeExercicio, $grupoMuscular, $carga, $repeticoes, $series, $descanso){
    //htmlspecialchars para proteger o arquivo de html injection
    $this->nomeExercicio = htmlspecialchars($nomeExercicio);
    $this->grupoMuscular = htmlspecialchars($grupoMuscular);
    $this->carga = htmlspecialchars($carga);
    $this->repeticoes = htmlspecialchars($repeticoes);
    $this->series = htmlspecialchars($series);
    $this->descanso = htmlspecialchars($descanso);
  }
}
?>