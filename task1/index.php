<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <form action="" method="get">
        <? if (isset($_GET["date1"])) { ?>
            <input type="date" name="date1" value=<? echo $_GET["date1"] ?> required>
            <input type="date" name="date2" value=<? echo $_GET["date2"] ?> required>
        <? } else { ?>
            <input type="date" name="date1" required>
            <input type="date" name="date2" required>
        <? } ?>
        <input type="submit">
    </form>
    <?php
    if (isset($_GET["date1"])) {
        $date1 = strtotime($_GET["date1"]);
        $date2 = strtotime($_GET["date2"]);
        $second = abs($date1 - $date2);
        $year = floor($second / 31536000);
        $day = floor($second / 86400);
        $hour = $day * 24;
        $minute = $hour * 60; 
    ?>
        <h3>Разница дат (<? echo $_GET["date1"] ?> — <? echo $_GET["date2"] ?>):</h3>
        <h4>В годах: <? echo $year ?></h4>
        <h4>В днях: <? echo $day ?></h4>
        <h4>В часах: <? echo $hour ?></h4>
        <h4>В минутах: <? echo $minute ?></h4>
        <h4>В секундах: <? echo $second ?></h4>
    <? } ?>
</body>
</html>