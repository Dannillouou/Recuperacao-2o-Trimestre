<?php
  class Usuario{
    var $nome;
    var $login;
    var $email;
    var $senha;

    public function __construct($nome, $login, $email, $senha){
      $this->nome = htmlspecialchars($nome);
      $this->login = htmlspecialchars($login);
      $this->email = htmlspecialchars($email);
      $this->senha = htmlspecialchars($senha);
    }
  }
?>