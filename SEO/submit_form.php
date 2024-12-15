<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "auto_service";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $car = $_POST['car'];
    $work = $_POST['work'];

    $stmt = $conn->prepare("INSERT INTO repair_requests (name, phone, car, work) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $phone, $car, $work);

    if ($stmt->execute()) {
        echo "Заявка успешно отправлена!";
    } else {
        echo "Ошибка: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>