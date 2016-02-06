<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Последние новости</title>
</head>
<body>
    <ul>
        <?php foreach($lastNews as $val): ?>
            <li>
                <header>
                    <a href="/App/Controllers/article.php?id=<?php echo $val->id; ?>">
                        <h2><?php echo $val->title; ?></h2>
                    </a>
                </header>
                <article>
                    <?php echo $val->text; ?>
                </article>
                <hr>
            </li>
        <?php endforeach; ?>
    </ul>
    <p>
        <a href="/App/Controllers/allNews.php">
            <button>Читать все новости</button>
        </a>
    </p>
    <p>
        <a href="/App/Controllers/add.php">
            <button>Добавить новость</button>
        </a>
    </p>
</body>
</html>