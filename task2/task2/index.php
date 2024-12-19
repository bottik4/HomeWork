<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>task2</title>
</head>
<body>
    <?php
    if (isset($_POST["name"])) {
        $name = trim($_POST["name"]);
        $email = trim($_POST["email"]);
        $text = trim($_POST["text"]);
        $date = date("d-m-Y H:i:s");

    $file = fopen("data.txt", "a");
        fwrite($file, "Имя: " .  $name . " Email: " . $email . " Дата отправки: " . $date . " Сообщение: " . $text . "---");
    fclose($file);
    }

    if (file_exists("data.txt")) {
        $fileStrings = file_get_contents("data.txt");
        $fileArray = explode("---", $fileStrings);
        $fileArrays = [];

        for ($i = 0; $i < sizeof($fileArray); $i++) { 
            array_push($fileArrays, explode("\n", $fileArray[$i]));
        }
    }
    ?>
    <div>
        <form action method="post">
            <input type="text" name="name" placeholder="Имя">
            <input type="email" name="email" placeholder="Email">
            <textarea name="text"placeholder="Cообщение"></textarea>
            <input type="submit">
        </form>
            <? if (isset($fileArrays)) { ?>
                <? for ($i = sizeof($fileArrays) - 2; $i >= 0; $i--) { ?>
                        <? for ($j = 0; $j < sizeof($fileArrays[$i]); $j++) { ?>
                            <p><? echo $fileArrays[$i][$j] ?></p>
                        <? } ?>
            <? }} ?>
    </div>
</body>
</html>
