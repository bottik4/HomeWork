<?php
if(isset($_FILES["file"])){
    $file_name = $_FILES["file"]["name"];
    $file_tmpname = $_FILES["file"]["tmp_name"];
    move_uploaded_file($file_tmpname, __DIR__."/$file_name");
}

if(isset($_GET["delete"]) && file_exists($_GET["delete"])){
    unlink($_GET["delete"]);
}

if(isset($_POST["rename"]) && isset($_POST["oldname"]) && isset($_POST["newname"])){
    $oldname = $_POST["oldname"];
    $newname = $_POST["newname"];
    if($oldname != "index.php" && file_exists($oldname) && !file_exists($newname)){
        rename($oldname, $newname);
    }
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <td>Название</td>
        </tr>
        <?php
        $dir = opendir(".");
        while($file = readdir($dir)) {
            if($file != "." && $file != ".."){
        ?>
        <tr>
            <td><?php echo htmlspecialchars($file); ?></td>
            <td>
                <?php if($file != "index.php") { ?>
                    <a href="index.php?delete=<?php echo urlencode($file); ?>">Удалить</a>
                <?php } ?>

                <?php if($file != "index.php") { ?>
                    <form method="post" action="" style="display:inline;">
                        <input type="hidden" name="oldname" value="<?php echo htmlspecialchars($file); ?>">
                        <input type="text" name="newname" placeholder="Новое имя">
                        <button type="submit" name="rename">Переименовать</button>
                    </form>
                <?php } ?>
            </td>
        </tr>
        <?php
            }
        }
        closedir($dir);
        ?>
    </table>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <button type="submit">Загрузить</button>
    </form>
</body>
</html>