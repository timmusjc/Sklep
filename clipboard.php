<?php
include 'dbconfig.php';
$mysqli = new mysqli($server, $user, $pass, $base);

echo "<h1>Корзина</h1>";


$result = $mysqli->query("SELECT * FROM koszyk JOIN products ON product_id = products_id");

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<img src='" . $row['image'] . "' alt='" . $row['model'] . "'>";
        echo "<h2>" . $row['firma'] . " " . $row['model'] . "</h2>";
        echo "<p>Цена: " . $row['price'] . " PLN</p>";
        echo "<p>Количество: " . $row['ilosc'] . "</p>";
        echo "<p>Итого: " . ($row['cena'] * $row['ilosc']) . " PLN</p>";
        echo "<form method='POST' action='update_cart.php'>";
        echo "<input type='hidden' name='product_id' value='" . $row['products_id'] . "'>";
        echo "<input type='number' name='quantity' value='" . $row['ilosc'] . "' min='1'>";
        echo "<button type='submit'>Обновить количество</button>";
        echo "</form>";
        echo "<form method='POST' action='remove_from_cart.php'>";
        echo "<input type='hidden' name='product_id' value='" . $row['products_id'] . "'>";
        echo "<button type='submit'>Удалить из корзины</button>";
        echo "</form>";
        echo "</div>";
    }
} else {
    echo "<p>Ваша корзина пуста.</p>";
}


$mysqli->close();
?>
