<?php

use App\Models\News;

require __DIR__ . '/../../autoload.php';

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $view = new \App\View();
    $view->article = News::findById($id);
    $view->display(__DIR__ . '/../views/news/admin.php');
} else {
    header('Location: /');
    exit;
}