<?php

use \App\Controllers\NewsController;

require __DIR__ . '/../../autoload.php';

$controller = new NewsController();
$controller->action('One');
