<?php

use \App\View;
use \App\Models\News;

require __DIR__ . '/autoload.php';

$view = new View();
$view->news = News::lastNews();
$view->display(__DIR__ . '/App/views/news/lastNews.php');
