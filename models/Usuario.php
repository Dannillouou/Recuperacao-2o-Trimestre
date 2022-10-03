<?php
  class Usuario{
    private $nome;
    private $login;
    private $email;
    private $senha;

    public function __construct($nome, $login, $email, $senha){
      $this->nome = htmlspecialchars($nome);
      $this->login = htmlspecialchars($login);
      $this->email = htmlspecialchars($email);
      $this->senha = htmlspecialchars($senha);
    }
  }
?>