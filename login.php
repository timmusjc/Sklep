<?php

$login = filter_var(trim($_POST['login']),
FILTER_SANITIZE_STRING);

$pass = filter_var(trim($_POST['pass']),
FILTER_SANITIZE_STRING);

$pass = md5($pass."gjfvjhgyf576547");


session_start();

    $mysql = new mysqli('localhost', 'Timofey', 'Astra2007!','sklep');

    $result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$pass'");
    $user = $result->fetch_assoc();
    if(!$user){
        echo "Użytkownika nie znaleziono";
        exit();
    }
    $_SESSION['user']=$login;
    $_SESSION['pu']=$user['pu'];

    $mysql->close();

    header('Location:./index.php');
    ?>


?>