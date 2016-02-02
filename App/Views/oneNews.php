<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?php echo $article->title ?></title>
</head>
<body>
    <header>
        <h2><?php echo $article->title; ?></h2>
    </header>
    <article>
        <?php echo $article->text; ?>
    </article>
    <hr>

    <h2>Обновление новости:</h2>
    <form method="post" action="/App/Controllers/update.php">
        <label for="id">ID новости:</label>
        <br>
        <input type="number" name="id" value="<?php echo $article->id ?>">
        <br>
        <label for="title">Заголовок:</label>
        <br>
        <input type="text" name="title" value="<?php echo $article->title; ?>">
        <br>
        <label for="text">Текст:</label>
        <br>
        <textarea cols="50" rows="5" name="text"><?php echo $article->text; ?></textarea>
        <br>
        <p>
            <button type="submit">Обновить</button>
        </p>
    </form>

    <h2>Удаление новости:</h2>
    <form method="post" action="/App/Controllers/delete.php">
        <label for="id">ID новости:</label>
        <br>
        <input type="number" name="id" value="<?php echo $article->id ?>">
        <p>
            <button type="submit">Удалить</button>
        </p>
    </form>
    <p>
        <a href="/index.php">
            <button>На главную</button>
        </a>
    </p>
</body>
</html>