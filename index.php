<?php

use \App\Models\News;

require __DIR__ . '/autoload.php';

try {

    $lastNews = News::lastNews();
    var_dump($lastNews);

} catch (PDOException $e) {

    echo 'Подключение не удалось' . $e->getMessage();

}
include __DIR__ . '/App/Views/lastNews.php';
