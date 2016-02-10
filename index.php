<?php

use \App\Controllers\News;

require __DIR__ . '/autoload.php';

$controller = new News();
$controller->actionIndex();