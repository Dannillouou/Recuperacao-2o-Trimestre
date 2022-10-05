<?php
  class Ficha{
    var $aluno;
    var $identificadorFicha;
    var $numeroExercicios;
    var $exercicios;

    function __construct($identificadorFicha, $aluno){
      $this->identificadorFicha = $identificadorFicha;
      $this->numeroExercicios = 0;
      $this->exercicios = [];
      $this->aluno = $aluno;
    }
  }
?>