<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Последние новости</title>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <h1>Последние новости</h1>
    <?php foreach($news as $article): ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <p>
                    <a href="/App/Controllers/article.php?id=<?php echo $article->id; ?>">
                        <h3><?php echo $article->title; ?></h3>
                    </a>
                </p>
            </div>
            <div class="panel-body">
                <p>
                    <?php echo $article->text; ?>
                </p>
            </div>
            <div class="panel-footer">
                <p>
                    Автор: <?php echo $article->author->name; ?>
                </p>
            </div>
        </div>

    <?php endforeach; ?>
    <p>
        <a href="/App/Controllers/allNews.php">
            <button type="button" class="btn btn-primary btn-md">Читать все новости</button>
        </a>
    </p>
    <p>
        <a href="/App/Controllers/add.php">
            <button type="button" class="btn btn-primary btn-md">Добавить новость</button>
        </a>
    </p>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>