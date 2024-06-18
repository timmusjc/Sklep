<?php
session_start();
include 'dbconfig.php';

$mysqli = new mysqli($server, $user, $pass, $base);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Проверка наличия необходимых данных в POST запросе
if(isset($_POST['imie'], $_POST['nazwisko'], $_POST['adres'], $_POST['telefon'], $_POST['lacznie'])) {
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $adres = $_POST['adres'];
    $telefon = $_POST['telefon'];
    $lacznie = $_POST['lacznie'];

    // Получаем товары из корзины
    $result = $mysqli->query("SELECT * FROM koszyk JOIN products ON product_id = products_id");

    if ($result->num_rows > 0) {
        while ($data = $result->fetch_assoc()) {
            $product_id = $data['product_id'];
            $ilosc = $data['ilosc'];
            $cena = $data['price'] * $data['ilosc'];
            $login = $_SESSION['user'];

            // Вставляем заказ в таблицу orders
            }
        $mysqli->query("INSERT INTO orders (login, adres, imie, nazwisko, telefon, cena, data) VALUES ('$login', '$adres', '$imie', '$nazwisko', '$telefon', '$lacznie', NOW())");

        // Закрываем соединение
        $mysqli->close();
        header("Location: index.php");

        // Очищаем корзину после оформления заказа
        // $mysqli->query("DELETE FROM koszyk WHERE 1");
    } else {
        echo "No items in the cart.";
    }
} else {
    echo "Missing required data in the POST request.";
}

?>
