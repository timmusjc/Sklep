<?php
session_start();
include 'dbconfig.php';

$product_id = $_POST['product_id'];
$new_quantity = $_POST['ilosc'];
$price = $_POST['price'];
$new_cena = $price * $new_quantity;

$mysqli = new mysqli($server, $user, $pass, $base);
$update_query = "UPDATE koszyk SET ilosc='$new_quantity', cena='$new_cena' WHERE product_id='$product_id'";
$mysqli->query($update_query);

$mysqli->close();
header("Location: koszyk.php");
?>
