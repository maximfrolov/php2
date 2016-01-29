<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Новость <?php echo $article->id ?></title>
</head>
<body>
    <header>
        <h2><?php echo $article->title; ?></h2>
    </header>
    <article>
        <?php echo $article->text; ?>
    </article>
</body>
</html>