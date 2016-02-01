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

// тест метода insert()
/*$user = new \App\Models\User();
$user->name = 'Петр';
$user->email = 'p@petrov.ru';
$user->insert();
echo $user->id;*/

// тест метода delete()
/*$user =new \App\Models\User();
$user->id = 8;
$user->delete();*/

// тест метода update()
/*$user = new App\Models\User();
$user->id = 7;
$user->name = 'Василий';
$user->email = 'vasily@pupkin.com';
$user->update();
var_dump($user);*/

// тест метода save()
/*$user = new App\Models\User();
$user->id = 7;
$user->name = 'Vasya';
$user->email = 'v@pupkin.ru';
$user->save();
var_dump($user);*/

/*$user = new \App\Models\User();
$user->name = 'Makar';
$user->email = 'm@sledopyt.ru';
$user->save();
var_dump($user);*/
