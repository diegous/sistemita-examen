<?php
/* -- Configuración -- */
require_once('../conf/load.php');


/* -- Inicio de Sesión -- */
if($_POST)
{
  if(User::validUser($_POST['username'], $_POST['password']))
  {
    $_SESSION['user'] = User::getUser($_POST['username']);
    echo 'true';
  }
  else
  {
    echo 'false';
  }
}
?>
