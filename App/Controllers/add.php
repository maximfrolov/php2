<?php

use \App\Models\News;

require __DIR__ . '/../../autoload.php';

if (!empty($_POST['title']) && !empty($_POST['text'])) {
    $article = new News();
    $article->title = $_POST['title'];
    $article->text = $_POST['text'];
    $article->save();
    header('Location: /');
    exit;
} else {
    include __DIR__ . '/../views/news/add.php';
}
