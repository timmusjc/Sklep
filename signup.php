<?php

$login = $_POST['login'];
$haslo = $_POST['haslo'];
$powtorz_haslo = $_POST['powtorz_haslo'];

include 'dbconfig.php';
$baza = mysqli_connect($server,$user,$pass,$base) or ('cos nie tak z polaczeniem z BD');

$sql="INSERT INTO `zarejestrowani` (`login`, `haslo`) VALUES ('$login', '$haslo');";
$result = $baza->query($sql) or die ('bledne zapytanie');

$baza->close();
echo "<br><center> Rejestracja powiodła się</center>";
?>