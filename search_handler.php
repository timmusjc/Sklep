<?php
require_once "dbconfig.php"; // Подключение к базе данных

header('Content-Type: application/json');

if (isset($_GET['q'])) {
    $searchQuery = $mysqli->real_escape_string($_GET['q']);
    $query = "SELECT * FROM products WHERE firma LIKE '%$searchQuery%' OR model LIKE '%$searchQuery%' OR opis LIKE '%$searchQuery%'";
    $result = $mysqli->query($query);

    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = [
            'name' => $row['firma'] . ' ' . $row['model'],
            'opis' => $row['opis'],
            'price' => $row['price'],
            'image' => $row['image']
        ];
    }

    echo json_encode($products);
}
?>
