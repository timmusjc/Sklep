<?php
include 'dbconfig.php';
$mysqli = mysqli_connect($server,$user,$pass,$base);


function getData($products_id) {
    global $mysqli;
    $where = "";
    $join = "";
    if($products_id){
    $where = "WHERE products_id =".$products_id;
    $join = "JOIN opis ON products.opis_id = opis.id";}

    $result = $mysqli->query("SELECT * FROM products $join $where");


    $mysqli->close();
    if(!$products_id)
        return resultToArray($result);
    else
        return $result->fetch_assoc();
}


function getDataKat($id) {
    global $mysqli;
    $where = "";
    $join = "";
    if($id){
    $where = "WHERE id =".$id;}

    $result = $mysqli->query("SELECT * FROM categories $where");


    $mysqli->close();
    if(!$id)
        return resultToArray($result);
    else
        return $result->fetch_assoc();
}




function resultToArray($result) {
    $info = array ();
    while (($row = $result->fetch_assoc()) !=false) {
        $info[] = $row;
    }
    return $info;
}






function getOpisData($id) {
    global $server, $user, $pass, $base;
    $mysqli = new mysqli($server, $user, $pass, $base);
    $query = "SELECT * FROM opis WHERE id = $id";
    $result = $mysqli->query($query);
    $data = $result->fetch_assoc();
    $mysqli->close();
    return $data;
}

?>