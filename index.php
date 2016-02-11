<?php

require __DIR__ . '/autoload.php';

$ctrl = $_GET['ctrl'] ?: 'NewsController';
$action = $_GET['act'] ?: 'Index';
$controllerName = '\App\Controllers\\' . $ctrl;

$controller = new $controllerName();
$controller->action($action);