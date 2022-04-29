<?php

require __DIR__.'/../vendor/autoload.php';

ini_set('display_errors', 1);

$controller = $_GET['controller'] ?? 'HomePageController';
$metodo = $_GET['metodo'] ?? 'index';

$controller = "Curso\\AplicacaoMvcExemplo\\Controllers\\$controller";;
$objController = new $controller();
$objController->$metodo();
