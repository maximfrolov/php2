<?php

require __DIR__ . '/../autoload.php';

$user = \App\Models\User::findById(3);
var_dump($user);
foreach($user as $key => $value) {
    var_dump($key, $value);
}

$it = new \App\MyIterator($user);
var_dump($user);
foreach($it->getData() as $key => $value) {
    var_dump($key, $value);

}

$user = ['name' => 'Василий', 'email' => 'v@pupkin.ru', 'id' => '1',];
$it = new \App\MyIterator($user);
var_dump($it);

foreach($it->getData() as $key => $value) {
    var_dump($key, $value);

}
// Не совсем разобрался с этой темой
