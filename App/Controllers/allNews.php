<?php

use \App\Models\News;

require __DIR__ . '/../../autoload.php';

$allNews = News::findAllDesc();

include __DIR__ . '/../views/allNews.php';