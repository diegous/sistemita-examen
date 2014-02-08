<?php
/* -- Configuración -- */
require_once('../conf/load.php');

/* -- Variables -- */
$page_title = 'Formulario';

if(isset($_SESSION['user']))
{
  $contenido = "../view/form.php";
  $city_list = City::getAll();
  $logout_content = '../view/logout.php';
}
else
{
  $contenido = "../view/message.php";
  $aviso = "Necesita iniciar sesi&oacute;n";
}

/* -- Vista -- */
include('../view/base.php');
