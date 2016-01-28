<?php

require __DIR__ . '/../autoload.php';

$userOne = new \App\Db();
$userOne->query(
    'SELECT * FROM users WHERE id=:id',
    '\App\Models\User',
    [':id' => 2]
);

var_dump($userOne);
