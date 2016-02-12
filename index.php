<?php

require __DIR__ . '/autoload.php';

$ctrl = $_GET['ctrl'] ?: 'NewsController';
$action = $_GET['act'] ?: 'Index';
$controllerName = '\App\Controllers\\' . $ctrl;

if (class_exists($controllerName)) {
    $controller = new $controllerName();
    $controller->action($action);
}
