<?php

$firma = $_POST['firma'];
$model = $_POST['model'];
$image = $_POST['image'];
$wyswietlacz = $_POST['wyswietlacz'];
$procesor = $_POST['procesor'];
$memory = $_POST['memory'];
$ram = $_POST['ram'];
$komunikacja = $_POST['komunikacja'];
$kategoria = $_POST['kategoria'];
$cena = $_POST['cena'];





include 'dbconfig.php';
$mysqli = mysqli_connect($server,$user,$pass,$base);

$result = $mysqli->query("INSERT INTO `products` (`firma`, `model`, `image`, `price`, `memory`, `category_id`) VALUES ('$firma', '$model', '$image', '$cena', '$pamiec_wbudowana' '$kategoria');");

$result1 = $mysqli->query("SELECT products_id FROM products ORDER BY products_id DESC LIMIT 1;");
$result1->fetch_assoc();
foreach($result1 as $data):
$product_id = $data['products_id'];
    
endforeach;
$result2 = $mysqli->query("INSERT INTO `opis` (`wyswietlacz`, `procesor`, `pamiec_wbudowana`, `ram`, `product_id`) VALUES ('$wyswietlacz', '$procesor', '$memory', '$ram', '$product_id');");
$mysqli->close();




echo "<br><center> Rejestracja powiodła się</center>";



header('Location:./index.php');

?>