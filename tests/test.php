<?php

require __DIR__ . '/../autoload.php';

$config = \App\Config::instance();
$config->counter = 1;
var_dump($config);

$config = \App\Config::instance();
var_dump($config);