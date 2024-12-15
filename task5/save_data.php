<?php
    if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["age"]) && isset($_POST["specialty"]) && isset($_POST["experience"])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $age = $_POST['age'];
        $specialty = $_POST['specialty'];
        $experience = $_POST['experience'];

    $f = fopen("data.txt","a");
        $string = "Имя: $name \n Email: $email \n Возраст: $age \n Специальность: $specialty \n Стаж работы: $experience \n";
        fwrite($f, $string);
        fclose($f);
    } else {
        echo "Форма не заполнена";
    }

    $file_string = file_get_contents("data.txt");
    $file_array = explode("\n", $file_string);
?>