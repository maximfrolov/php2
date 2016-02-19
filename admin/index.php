<?php

require __DIR__ . '/../autoload.php';

$uri = explode('/', $_SERVER['REQUEST_URI'], PHP_URL_PATH);

$ctrl   = !empty($uri[2]) ? ucfirst($uri[2]) : 'Admin';
$action = !empty($uri[3]) ? ucfirst($uri[3]) : 'Index';

$controllerName = '\App\Controllers\\' . $ctrl;

try {
    if (class_exists($controllerName)) {
        $controller = new $controllerName();
        $controller->action($action);
    }
}  catch (\App\Exceptions\Error404 $e) {
    \App\Logger::loggingError($e);
    $controller->action('Error', $e);

} catch (\App\Exceptions\Db $e) {
    \App\Logger::loggingError($e);
    $controller->action('Error', $e);
}