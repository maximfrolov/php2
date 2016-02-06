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
    <p>
        <a href="/App/Controllers/admin.php?id=<?php echo $article->id; ?>">
            <button>Редактировать новость</button>
        </a>
    </p>
    <p>
        <a href="/index.php">
            <button>На главную</button>
        </a>
    </p>
</body>
</html>