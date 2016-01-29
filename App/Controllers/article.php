<?php

use \App\Models\News;

require __DIR__ . '/../../autoload.php';

try {

    if(!empty($_GET['id'])) {
        $id = $_GET['id'];
        $article = News::findById($id);
        include __DIR__ . '/../Views/oneNews.php';
    } else {
        header('Location: /');
        exit;
    }

} catch (PDOException $e) {

    echo 'Подключение не удалось' . $e->getMessage();
}
