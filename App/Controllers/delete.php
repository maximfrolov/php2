<?php

use \App\Models\News;

require __DIR__ . '/../../autoload.php';

if (!empty($_POST['id'])) {
    $id = $_POST['id'];
    $article = News::findById($id);
    $article->delete();
}
header('Location: /');
exit;