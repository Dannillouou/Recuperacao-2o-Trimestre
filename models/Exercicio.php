<?php 
class Exercicio{
  var $nomeExercicio;
  var $grupoMuscular;
  var $carga;
  var $repeticoes;
  var $series;

  function __construct($nomeExercicio, $grupoMuscular, $carga, $repeticoes, $series){
    //htmlspecialchars para proteger o arquivo de html injection
    $this->nomeExercicio = htmlspecialchars($nomeExercicio);
    $this->grupoMuscular = htmlspecialchars($grupoMuscular);
    $this->carga = htmlspecialchars($carga);
    $this->repeticoes = htmlspecialchars($repeticoes);
    $this->series = htmlspecialchars($series);
  }
}
?>