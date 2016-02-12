<!DOCTYPE html>
<html lang="ru"
<head>
    <meta charset="UTF-8">
    <title>Админ-панель</title>
    <style>
        fieldset {
            width: 50%;
        }
    </style>
</head>
<body>
<div>
    <h2>Админ-панель:</h2>
</div>
    <fieldset>
        <legend>Редактирование новости:</legend>
        <form method="post" action="/admin/index.php?ctrl=AdminController&act=Update">
            <input type="hidden" name="id" value="<?php echo $article->id ?>">
            <br>
            <label for="title">Заголовок:</label>
            <br>
            <input type="text" name="title" value="<?php echo $article->title; ?>">
            <br>
            <label for="text">Текст:</label>
            <br>
            <textarea cols="50" rows="5" name="text"><?php echo $article->text; ?></textarea>
            <br>
            <label for="author_id">ID автора:</label>
            <br>
            <input type="number" name="author_id" value="<?php echo $article->author_id ?>">
            <p>
                <button type="submit">Обновить новость</button>
                <button type="reset">Сброс</button>
            </p>
        </form>
        <!-- форма для удаления новости -->
        <form method="post" action="/admin/index.php?ctrl=AdminController&act=Delete">
            <input type="hidden" name="id" value="<?php echo $article->id ?>">
            <p>
                <button type="submit">Удалить новость</button>
            </p>
        </form>
    </fieldset>
</div>
<p>
    <a href="/admin/index.php?ctrl=AdminController&act=Index">
        <button>Назад</button>
    </a>
</p>
</body>
</html>