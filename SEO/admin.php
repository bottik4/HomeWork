<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ панель</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Список записей</h1>
</body>
</html>
<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "auto_service";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_password = $_POST['password'];
    if ($admin_password == "admin") {
        $_SESSION['admin'] = true;
        header("Location: admin.php");
        exit();
    } else {
        echo "Неверный пароль!";
    }
}

if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) {
    $sql = "SELECT * FROM repair_requests";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>ФИО</th>
                    <th>Телефон</th>
                    <th>Автомобиль</th>
                    <th>Вид работ</th>
                </tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["name"] . "</td>
                    <td>" . $row["phone"] . "</td>
                    <td>" . $row["car"] . "</td>
                    <td>" . $row["work"] . "</td>

                  </tr>";
        }
        echo "</table>";
    }
} else {
    echo '<form action="admin.php" method="post">
            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" required><br>
            <button type="submit">Войти</button>
          </form>';
}

?>
