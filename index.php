<?php

require __DIR__ . '/autoload.php';

$db = new \App\Db();
$data = $db->query('SELECT * FROM users');