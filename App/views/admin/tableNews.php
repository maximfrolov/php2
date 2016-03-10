<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Таблица новостей</title>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <!-- Own CSS styles -->
    <link rel="stylesheet" href="/App/assets/css/main.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Brand</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/admin/admin/index/">Все новости</a></li>
                <li><a href="/admin/admin/add/">Добавить новость</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<table class="table">
    <thead>
    <tr>
        <th>ID Новости</th>
        <th>Заголовок</th>
        <th>ID Автора</th>
        <th>Редактировать</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($news as $entry): ?>
        <tr>
            <?php foreach ($entry as $cell): ?>
                <td>
                    <?php echo $cell ?>
                </td>
            <?php endforeach; ?>
            <td>
                <a class="btn btn-sm btn-primary" href="/admin/admin/edit/?id=<?php echo $entry[0]; ?>">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                </a>
            </td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>

<footer class="navbar-fixed-bottom row-fluid text-center">
    <div class="container">
        <span>&copy 2016 Максим Фролов. Все права защищены.</span>
        <span class="pull-right"><?php echo $resources; ?></span>
    </div>
</footer>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>