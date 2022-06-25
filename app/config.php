<?php

session_start();

// saber si estamos en servidor local

define('IS_LOCAL',in_array($_SERVER['REMOTE_ADDR'],['127.0.0.1','::1']));

$web_url = IS_LOCAL ? 'http://127.0.0.1:8080/PROYECTOS/SistemaCotizador/': 'LA URL DEL SERVIDOR EN PRODUCCION';
define ('URL', $web_url);


// rutas  para carpetas
define('DS',DIRECTORY_SEPARATOR);
define('ROOT', getcwd().DS); 
define('APP',ROOT.'app'.DS);
define('ASSETS',ROOT.'assets'.DS);
define('TEMPLATE',ROOT.'template'.DS);
define('INCLUDE',TEMPLATE.'include'.DS);
define('MODULES',TEMPLATE.'modules'.DS);
define('VIEWS',TEMPLATE.'views'.DS);
define('UPLOADS', ROOT.'uploads'.DS);

// pARA ARCHIVOS DE Crpetas incluidas

define('CSS', URL.'assets/css/');
define('IMG', URL.'assets/image/');
define('JS', URL.'assets/js/');


require_once  APP.'functions.php';


