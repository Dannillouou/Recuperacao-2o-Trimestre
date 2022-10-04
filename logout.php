<?php
  //inicia a sessão nessa parte do codigo
  session_start();
  //destroi a sessão
  session_destroy();
  header('Location: index.php?desconectado=true');
?>