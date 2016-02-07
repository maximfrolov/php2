<?php

use \App\View;
use \App\Models\News;

require __DIR__ . '/../../autoload.php';

$view = new View();
$view->news = News::findAllDesc();
$view->display(__DIR__ . '/../views/news/allNews.php');