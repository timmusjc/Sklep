<?php
require_once"functions.php";
$products = getData($_GET["id"]);
$id = $products['products_id'];


include 'dbconfig.php';
$mysqli = mysqli_connect($server, $user, $pass, $base);

$result = $mysqli->query("DELETE FROM `products` WHERE `products`.`products_id` = $id");

$mysqli->close();
header('Location: ./index.php');

?>