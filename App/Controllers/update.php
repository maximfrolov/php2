<?php

use App\Models\News;
use App\View;

require __DIR__ . '/../../autoload.php';

$view = new View();
if (!empty($_POST['title']) &&
    !empty($_POST['text']) &&
    !empty($_POST['author_id']) &&
    !empty($_POST['id'])) {
    $id = $_POST['id'];
    $view->article = News::findById($id);
    $view->article->title     = $_POST['title'];
    $view->article->text      = $_POST['text'];
    $view->article->author_id = $_POST['author_id'];
    $view->article->save();
    header('Location: /');
    exit;
}
$view->display(__DIR__ . '/../views/news/admin.php');