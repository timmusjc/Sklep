<?php
include 'dbconfig.php';
$mysqli = new mysqli($server, $user, $pass, $base);

$product_id = $_POST['product_id'];
$quantity = $_POST['ilosc'];

if ($quantity > 0) {
    $mysqli->query("UPDATE `koszyk` SET `ilosc` = $ilosc WHERE `product_id` = $product_id");
} else {
    $mysqli->query("DELETE FROM `koszyk` WHERE `product_id` = $product_id");
}

header('Location: clipboard.php');
?>
