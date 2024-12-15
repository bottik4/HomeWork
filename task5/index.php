<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>task5</title>
    <script src="main.js"></script>
</head>
<body>
    <form id="userForm">
        <p>Имя:</p>
        <input type="text" id="name" name="name"><br><br>
        <p>Email:</p>
        <input type="email" id="email" name="email"><br><br>
        <p>Возраст:</p>
        <input type="number" id="age" name="age"><br><br>
        <p>Специальность</p>
        <input type="text" id="specialty" name="specialty"><br><br>
        <p>Стаж:</p>
        <input type="number" id="experience" name="experience"><br><br>
        <button type="button" onclick="submitForm()">Отправить</button>
    </form>
    <div id="errorMessage"></div>
</body>
</html>