<?php

use \App\Models\News;
use \App\View;

require __DIR__ . '/../../autoload.php';

$view = new View();
if (!empty($_POST['title']) &&
    !empty($_POST['text']) &&
    !empty($_POST['author_id'])) {
    $view->news = new News();
    $view->news->title     = $_POST['title'];
    $view->news->text      = $_POST['text'];
    $view->news->author_id = $_POST['author_id'];
    $view->news->save();
    header('Location: /');
    exit;
} else {
    $view->display(__DIR__ . '/../views/news/add.php');
}
