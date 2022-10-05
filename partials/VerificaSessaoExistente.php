<?php
//codigo que verifica se há uma sessão em andamento sempre que as paginas do site são acessadas
  function VerificaSessao(){
    session_start();
    if(isset($_SESSION['user']))
      return true;
    else
      return false;
  }  
?>