<?php

// No PHP, a função define() é usada para criar constantes, ou seja, valores que não podem ser alterados durante a execução do script. Ela permite que você associe um nome a um valor fixo que será acessível globalmente.
define("URL_BASE", "http://localhost/sistema-escola-App/public/");
define("API_BASE", "http://localhost/sistema-escola/public/");

//Configurações do Banco de Dados
define('DB_HOST', 'smpsistema.com.br');
define('DB_NAME', 'u283879542_giovani_n');
define('DB_USER', 'u283879542_giovani_n');
define('DB_PASS', '_Tipi@03');

// Configurações do Email
define('EMAIL_HOST', 'smtp.hostinger.com.br');
define('EMAIL_PORT', '465');
define('EMAIL_USER', 'tipi03@smpsistema.com.br');
define('EMAIL_PASS', 'Senac@tipi03');


//Sistemas de carregamento automatico de class
spl_autoload_register(function ($class) {

    if (file_exists('../app/controllers/' . $class . '.php')) {
                           //'../app/controllers/HomeController.php'
        require_once '../app/controllers/' . $class . '.php';
    }

    if(file_exists('../routes/'. $class . '.php')){
        require_once '../routes/'. $class . '.php';
    }

});
