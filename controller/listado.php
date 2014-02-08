<?php
/* -- Configuración -- */
require_once('../conf/load.php');

/* -- Variables -- */
if(isset($_SESSION['user']))
{
  $page_title = 'Listado';
  $logout_content = '../view/logout.php';
  if($user_list = Client::getAll())
  {
    $contenido = '../view/list.php';
  }
  else
  {
    $contenido = '../view/message.php';
    $aviso = 'El listado est&aacute; vac&iacute;o';
  }  
}
else
{
  $contenido = "../view/message.php";
  $aviso = "Necesita iniciar sesi&oacute;n";
}

/* -- Vista -- */
include('../view/base.php');
