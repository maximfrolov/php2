<!DOCTYPE html>
<html lang="ru"
<head>
    <meta charset="UTF-8">
    <title>Админ-панель</title>
</head>
<body>
<div>
    <h2>Добавление новости:</h2>

    <form method="post" action="/App/Controllers/add.php">
        <label for="title">Заголовок:</label>
        <br>
        <input type="text" name="title">
        <br>
        <label for="text">Текст:</label>
        <br>
        <textarea cols="50" rows="5" name="text"></textarea>
        <p>
            <button type="submit" >Добавить</button>
            <button type="reset" >Сброс</button>
        </p>
    </form>
    <p>
        <a href="/index.php">
            <button>На главную</button>
        </a>
    </p>
</div>
</body>
</html>