<?php
$server = "localhost";
$dbusername = "root";
$dbpassword = "root";
$dbname = "student_9";

$conn = new mysqli($server, $dbusername, $dbpassword, $dbname);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>task4</title>
</head>
<body>
    <form action method="post">
        <input type="text" name="firstName" placeholder="Имя">
        <input type="text" name="secondName" placeholder="Фамилия">
        <input type="submit">
    </form>
    <?php 
    if (isset($_POST["firstName"])) {
        $firstName = trim($_POST["firstName"]);
        $secondName = trim($_POST["secondName"]);
        $fullNames = $firstName . " " . $secondName;

        $sql = "INSERT INTO `first_work` (value) VALUES ('$fullNames')";
        $conn->query($sql);
    }
    if (isset($_POST["fullNameEdit"]) || isset($_POST["date"])) {
        $id = $_POST["id"];
        $fullNames = trim($_POST["fullNameEdit"]);
        $date = $_POST["date"];
    
        $sql = "UPDATE `first_work` SET value = '$fullNames', action_date = '$date' WHERE id = '$id'";
        $conn->query($sql);
        $_GET["edit"] = null;
    } 

    $sql = "SELECT * FROM `first_work`";
    $result = $conn->query($sql);

    $student = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            array_push($student, $row);
        } 
    }
    ?>
        <? for ($i = 0; $i < sizeof($student); $i++) { ?>
                <? if ($_GET["edit"] == $student[$i]["id"]) { ?>
                    <form action method="post">
                        <input type="text" name="id" value="<? echo $student[$i]["id"] ?>" hidden>
                        <input type="text" name="fullNameEdit" value="<? echo $student[$i]["value"] ?>">
                        <input type="datetime-local" name="date" value="<? echo $student[$i]["action_date"] ?>">
                        <input type="submit" value="Сохранить"></td>
                    </form>
                <? } else { ?>
                    <? echo $student[$i]["value"] ?>
                    <? echo $student[$i]["action_date"] ?>
                    <a href="?edit=<? echo $student[$i]["id"] ?>">Редактировать</a>
                <? } ?>
        <? } ?>

</body>
</html>