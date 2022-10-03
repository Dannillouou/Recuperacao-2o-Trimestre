<?php 
class Exercicio{
  private $nomeExercicio;
  private $grupoMuscular;
  private $carga;
  private $repeticoes;

  function __construct($nomeExercicio, $grupoMuscular, $carga, $repeticoes){
    $this->nomeExercicio = htmlspecialchars($nomeExercicio);
    $this->grupoMuscular = htmlspecialchars($grupoMuscular);
    $this->carga = htmlspecialchars($carga);
    $this->repeticoes = htmlspecialchars($repeticoes);
  }
}
?>