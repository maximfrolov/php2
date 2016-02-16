<?php

require __DIR__ . '/../autoload.php';

$user = \App\Models\User::findById(3);

foreach($user as $key => $value) {
    echo $key . ': ' . $value . '<br>';
}

$user = new \App\Collection();
$user['name'] = 'Василий';
$user['email'] = 'v@pupkin.ru';
$user['id'] = '1';

foreach($user as $key => $value) {
    echo $key . ': ' . $value . '<br>';

}
