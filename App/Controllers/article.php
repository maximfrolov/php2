<?php

use \App\Models\News;
use \App\View;

require __DIR__ . '/../../autoload.php';

if(!empty($_GET['id'])) {
    $id = $_GET['id'];
    $view = new View();
    $view->article = News::findById($id);
    $view->display(__DIR__ . '/../views/news/oneNews.php');
} else {
    header('Location: /');
    exit;
}
