<?php
/* -- Configuración -- */
require_once('../conf/load.php');

/* -- Variables -- */

$page_title = 'Inicio';
if(isset($_SESSION['user']))
{
  $menu_list = MenuOption::getAll();
  $contenido = '../view/menu.php';
  $logout_content = '../view/logout.php';
}
else
{
  $contenido = '../view/login.php';
}

/* -- Vista -- */
include('../view/base.php');
