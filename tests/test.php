<?php

require __DIR__ . '/../autoload.php';

$a = new \App\Db();
$a->query(
    'SELECT * FROM users WHERE id=:id',
    '\App\Models\User',
    [':id' => 2]
);

var_dump($a);