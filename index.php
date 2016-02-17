<?php

require __DIR__ . '/autoload.php';

$uri = explode('/', $_SERVER['REQUEST_URI'], PHP_URL_PATH);

$ctrl   = !empty($uri[1]) ? ucfirst($uri[1]) : 'News';
$action = !empty($uri[2]) ? ucfirst($uri[2]) : 'Index';

$controllerName = '\App\Controllers\\' . $ctrl;

try {
    if (class_exists($controllerName)) {
        $controller = new $controllerName();
        $controller->action($action);
    }
} catch (\App\Exceptions\Db $e) {
    $controller->action('Error', $e->getMessage());
}
