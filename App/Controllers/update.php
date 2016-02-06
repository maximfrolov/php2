<?php

use App\Models\News;

require __DIR__ . '/../../autoload.php';

if (!empty($_POST['title']) &&
    !empty($_POST['text']) &&
    !empty($_POST['id'])) {
        $id = $_POST['id'];
        $article = News::findById($id);
        $article->title = $_POST['title'];
        $article->text = $_POST['text'];
        $article->save();
        header('Location: /');
        exit;
}
include __DIR__ . '/../views/admin.php';
