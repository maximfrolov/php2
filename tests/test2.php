<?php

namespace tests;

use App\Models\User;
use \PDOException;

require __DIR__ . '/../autoload.php';

try {

    $byId = User::findById(2);
    var_dump($byId);

} catch (PDOException $e) {

    echo 'Подключение не удалось' . $e->getMessage();
}
