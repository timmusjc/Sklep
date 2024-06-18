<?php
require_once"functions.php";
$categories = getDataKat($_GET["id"]);
$id = $categories['id'];


include 'dbconfig.php';
$mysqli = mysqli_connect($server, $user, $pass, $base);

$result = $mysqli->query("DELETE FROM `categories` WHERE `categories`.`id` = $id");

$mysqli->close();
header('Location: ./index.php');

?>