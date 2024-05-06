<?php

$login = $_POST['login'];
$haslo = $_POST['haslo'];
$powtorz_haslo = $_POST['powtorz_haslo'];
$pu = 0;

include 'dbconfig.php';
$baza = mysqli_connect($server,$user,$pass,$base) or ('cos nie tak z polaczeniem z BD');

$sql="INSERT INTO `users` (`login`, `haslo`, `pu`) VALUES ('$login', '$haslo', '$pu');";
$result = $baza->query($sql) or die ('bledne zapytanie');

$base->close();
echo "<br><center> Rejestracja powiodła się</center>";
?>