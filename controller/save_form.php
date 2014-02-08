<?php
/* -- Configuración -- */
require_once('../conf/load.php');

/* -- Variables -- */
$page_title = 'Alta';

if(isset($_SESSION['user']))
{
  if($_POST['city_id'] && $_POST['email'] && $_POST['nombre'] && $_POST['dni'] && $_POST['genero'] && $_POST['observaciones'])
  {
    $client = Client::populateFromArray($_POST);

    if($client->addClient())
    {
      $aviso = "Alta realizada con éxito";
    }
  }
  else
  {
    $aviso = "Falt&oacute; alg&uacute;n par&aacute;metro";
  }
  $contenido = '../view/message.php';
}
else
{
  $aviso = "Debe loguearse para entrar a esta secci&oacute;n";
  $contenido = '../view/message.php';
}


/* -- Vista -- */
include('../view/base.php');
