<?php

require __DIR__.'/../vendor/autoload.php';

$controller = $_GET['controller'] ?? 'HomePageController';
$metodo = $_GET['metodo'] ?? 'index';

$controller = "Curso\\AplicacaoMvcExemplo\\Controllers\\$controller";;
$objController = new $controller();
$objController->$metodo();
