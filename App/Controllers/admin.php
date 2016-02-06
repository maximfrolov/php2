<?php

use App\Models\News;

require __DIR__ . '/../../autoload.php';

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $article = News::findById($id);
    include __DIR__ . '/../views/admin.php';
} else {
    header('Location: /');
    exit;
}