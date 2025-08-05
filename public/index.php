<?php 

session_start();

//Carregando as configurações iniciais!
require_once('../config/config.php');

if(session_status() === PHP_SESSION_NONE){
    session_start();
}

$routes = new Routes();
$routes->execute();