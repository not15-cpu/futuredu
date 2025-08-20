<?php 

session_start();

//Carregando as configurações iniciais!
require_once('../config/config.php');


$routes = new Routes();
$routes->execute();
