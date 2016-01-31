<?php

require __DIR__ . '/../autoload.php';

/*$config = \App\Config::instance();
$config->counter = 1;
var_dump($config);

$config = \App\Config::instance();
var_dump($config);*/

// тест класса Config
/*$config = \App\Config::instance();
$config->counter = 1;
echo $config->data['db']['driver'];
echo $config->data['db']['dbname'];
echo $config->data['db']['host'];
echo $config->data['db']['user'];
echo $config->data['db']['password'];
var_dump($config);

$config = \App\Config::instance();
var_dump($config);*/

// тест вывода полей модели через foreach в методе insert()
$user = new \App\Models\News();
$user->insert();