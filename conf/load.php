<?php
ini_set('display_errors', 'on');

/*-- Conexión a base de datos --*/
require_once('ConnectionManager.php');

/*-- MDB2 --*/
require_once('MDB2.php');

/*-- Modelos --*/
require_once('../model/user.php');
require_once('../model/city.php');
require_once('../model/client.php');
require_once('../model/menuOption.php');

/*-- Inicio de sesión --*/
session_start();
