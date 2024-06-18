<?php
require_once"functions.php";
include 'dbconfig.php';
$products = getData($_GET["id"]);
$id = $products['products_id'];

$mysqli = new mysqli($server, $user, $pass, $base);


$mysqli->query("DELETE FROM `koszyk` WHERE `product_id` = $id");

$mysqli->close();

header('Location: koszyk.php');
?>