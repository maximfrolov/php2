<?php

namespace tests;

use App\Models\User;
use \PDOException;

require __DIR__ . '/../autoload.php';

try {

    $res = $byId = User::findById(1);
    var_dump($res);

} catch (PDOException $e) {

    echo 'Подключение не удалось' . $e->getMessage();
}
