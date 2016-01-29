<?php

use \App\Models\News;

require __DIR__ . '/autoload.php';

$lastNews = News::lastNews();

include __DIR__ . '/App/Views/lastNews.php';
