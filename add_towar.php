<?php
include 'dbconfig.php';

$firma = $_POST['firma'];
$model = $_POST['model'];
$wyswietlacz = $_POST['wyswietlacz'];
$procesor = $_POST['procesor'];
$memory = $_POST['memory'];
$ram = $_POST['ram'];
$komunikacja = $_POST['komunikacja'];
$kategoria = $_POST['kategoria'];
$cena = $_POST['cena'];

// Обрабатываем загрузку файла
$upload_dir = 'uploads/';
$image_path = $upload_dir . basename($_FILES['image']['name']);
$image_file_type = strtolower(pathinfo($image_path, PATHINFO_EXTENSION));

if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    if ($image_file_type == "jpg" || $image_file_type == "png" || $image_file_type == "jpeg" || $image_file_type == "gif") {
        // Создаем директорию, если она не существует
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        // Перемещаем загруженный файл в папку загрузок
        if (move_uploaded_file($_FILES['image']['tmp_name'], $image_path)) {
            // Подключение к базе данных
            $mysqli = new mysqli($server, $user, $pass, $base);

            // Вставка данных в таблицу opis
            $result2 = $mysqli->query("INSERT INTO `opis` (`wyswietlacz`, `procesor`, `pamiec_wbudowana`, `ram`, `komunikacja`) VALUES ('$wyswietlacz', '$procesor', '$memory', '$ram', '$komunikacja')");

            // Получение последнего вставленного id из таблицы opis
            $opis_id_result = $mysqli->query("SELECT id FROM opis ORDER BY id DESC LIMIT 1");
            $opis_id_data = $opis_id_result->fetch_assoc();
            $opis_id1 = $opis_id_data['id'];

            // Вставка данных в таблицу products
            $result = $mysqli->query("INSERT INTO `products` (`firma`, `model`, `image`, `price`, `memory`, `category_id`, `opis_id`) VALUES ('$firma', '$model', '$image_path', '$cena', '$memory', '$kategoria', '$opis_id1')");

            // Закрытие соединения
            $mysqli->close();

            // Перенаправление на главную страницу
            header('Location: ./index.php');
        } else {
            echo "Ошибка при загрузке файла.";
        }
    } else {
        echo "Разрешены только файлы JPG, JPEG, PNG и GIF.";
    }
} else {
    echo "Ошибка при загрузке файла.";
}
?>
