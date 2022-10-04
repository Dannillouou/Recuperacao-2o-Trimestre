//codigo que verifica se há uma sessão em andamento sempre que as paginas do site são acessadas
session_start();
if(!isset($_SESSION['user'])){
  header('Location: index.php');
  exit;
}