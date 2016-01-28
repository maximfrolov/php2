<?php

spl_autoload_register(function($class)
{
    if(preg_match('/\\\\/', $class)) {
        $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    }
    $fileName = __DIR__ . DIRECTORY_SEPARATOR . $class . '.php';
    if(file_exists($fileName)) {
        require_once $fileName;
    }
});