<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Контактная информация - Автосервис</title>
    <meta name="description" content="Контактная информация автосервиса. Свяжитесь с нами для записи на ремонт.">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>AUTOTERMINAL</h1>
        <nav>
            <ul>
                <li><a href="index.php">Главная</a></li>
                <li><a href="schedule.php">Режим работы</a></li>
                <li><a href="history.php">История автосервиса</a></li>
                <li><a href="portfolio.php">Портфолио работ</a></li>
                <li><a href="contact.php">Контактная информация</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Контактная информация</h2>
        <p>Адрес: г. Протвино, Институтское ш., 4А</p>
        <p>Телефон: +7 (123) 456-78-90</p>
        <p>Email: info@avtoservis.ru</p>
        <div id="map">
        <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A7751add90ea0a0eca4468e83ce15e7b89a91d622ff4b4e7f29d1bd72d37ba66c&amp;width=500&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script>
        </div>
        <h2>Форма заявки на ремонт</h2>
        <form action="submit_form.php" method="post">
        <label for="name">Имя:</label>
        <input type="text" id="name" name="name" required><br>
        <label for="phone">Телефон:</label>
        <input type="text" id="phone" name="phone" required><br>
        <label for="car">Автомобиль:</label>
        <input type="text" id="car" name="car" required><br>
        <label for="work">Вид работ:</label>
        <input type="text" id="work" name="work" required><br>
        <button type="submit">ЗАПИСАТЬСЯ</button>
    </form>
    </main>
    <footer>
        <p>2024 AUTOTERMINAL</p>
    </footer>
</body>
</html>