<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Все новости</title>
</head>
<body>
<ul>
    <?php foreach($allNews as $val): ?>
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
    <a href="/index.php">
        <button>На главную</button>
    </a>
</p>
</body>
</html>