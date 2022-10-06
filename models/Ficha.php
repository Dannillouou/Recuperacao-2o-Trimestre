<?php

// A ficha possui nome, um identificador/nome, o número de exercícios
// nela contidos e um array de exercícios. Uma ficha é identificável através
// do seu nome e do aluno que a possui, então cada combinação de aluno e
// nome de ficha é única

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