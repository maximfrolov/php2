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
<div>
    <fieldset>
        <legend>Добавление новости:</legend>
        <form method="post" action="/admin/index.php?ctrl=AdminController&act=Add">
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
                <button type="submit" >Добавить новость</button>
                <button type="reset" >Сброс</button>
            </p>
        </form>
    </fieldset>
</div>
    <p>
        <a href="/index.php">
            <button>На главную</button>
        </a>
    </p>
</body>
</html>