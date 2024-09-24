<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forms</title>
</head>
<body>
    <?php
        if(!empty($_POST["firstname"]) && !empty($_POST["email"]) && !empty($_POST["age"])){
            $name = $_POST["firstname"];
            $family = $_POST["email"];
            $age = $_POST["age"];
            $today = date("Y-m-d H:i:s"); 
            echo "<h3>$name $family, $age</h3>";

            $f = fopen("data.txt","a");
            $string = "Имя отправителя: " . $name . " Почта отправителя: " . $family . " Сообщение отправителя: " . $age . " Дата и время отправки: " . $today . "\n";
            fwrite($f,$string);

            fclose($f);
            
        }else{
            echo "Форма не заполнена";
        }

    ?>

    <form action="" method="post">
        <input type="text" name="firstname" placeholder="Введите имя"><br>
        <input type="email" name="email" placeholder="Введите почту"><br>
        <textarea name="age" cols="40" rows="5" placeholder="Введите текст"></textarea><br> 
        
        <?php
            
        ?>

        </select>

        <input type="submit" value="Отправить">
    </form>
    <table border=1>

    
    <?php
        $f = fopen("data.txt","r");
        $data="";
        while(!feof($f)){
            $data = fread($f,1024);
        }

        fclose($f);

        $data = str_replace("\n","<br>",$data);

        
        $file_array = file("data.txt");
        
        $array_count = count($file_array);

        for($i = 0; $i < $array_count; $i++) {
            echo "<tr><td>". $file_array[$i]."<br></tr></td>";
        }
    ?>
    </table>
</body>
</html>