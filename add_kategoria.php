<?php

$nazwa = $_POST['nazwa'];
$image = $_POST['image'];








include 'dbconfig.php';
$mysqli = mysqli_connect($server,$user,$pass,$base);

$result = $mysqli->query("INSERT INTO `categories` (`nazwa`, `image`) VALUES ('$nazwa', '$image');");

$mysqli->close();
header('Location:./index.php');
?>