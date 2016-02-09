<?php

use \App\Models\News;
use \App\View;

require __DIR__ . '/../../autoload.php';

$view = new View();
if (!empty($_POST['id'])) {
    $id = $_POST['id'];
    $view->article = News::findById($id);
    $view->article->delete();
    header('Location: /');
    exit;
} else {
    $view->display(__DIR__ . '/../views/news/admin.php');
}
