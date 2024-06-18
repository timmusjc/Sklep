<?php
session_start();
include 'dbconfig.php';

$product_id = $_GET['id'];
$mysqli = new mysqli($server, $user, $pass, $base);

$query = "SELECT * FROM koszyk WHERE product_id='$product_id'";
$result = $mysqli->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $new_quantity = $row['ilosc'] + 1;
    $update_query = "UPDATE koszyk SET ilosc='$new_quantity' WHERE product_id='$product_id'";
    $mysqli->query($update_query);
} else {
    $insert_query = "INSERT INTO koszyk (product_id, ilosc) VALUES ('$product_id', 1)";
    $mysqli->query($insert_query);
}

$mysqli->close();
header("Location: koszyk.php");
?>
