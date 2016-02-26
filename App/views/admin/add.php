<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Админ-панель</title>

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

<div class="container">
    <h2>Добавление новости:</h2>
    <form method="post" action="/admin/admin/create/">
        <label for="title">Заголовок:</label>
        <br>
        <input type="text" name="title">
        <br>
        <label for="text">Текст:</label>
        <br>
        <textarea cols="50" rows="5" name="text"></textarea>
        <br>
        <label for="author_id">ID автора:</label>
        <br>
        <input type="number" name="author_id">
        <p>
            <button type="submit">Добавить новость</button>
            <button type="reset">Сброс</button>
        </p>
    </form>
    <p>
        <a href="/admin/admin/index/">
            <button>Назад</button>
        </a>
    </p>
</div>

<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>