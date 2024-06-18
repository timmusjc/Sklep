<?php
session_start();
include 'dbconfig.php';

// Получаем данные из POST запроса
$id = $_POST['id'];
$firma = $_POST['firma'];
$model = $_POST['model'];
$wyswietlacz = $_POST['wyswietlacz'];
$procesor = $_POST['procesor'];
$pamiec_wbudowana = $_POST['pamiec_wbudowana'];
$ram = $_POST['ram'];
$komunikacja = $_POST['komunikacja'];
$kategoria = $_POST['kategoria'];
$cena = $_POST['cena'];

// Обрабатываем загрузку файла
$upload_dir = 'uploads/';
$image_path = $upload_dir . basename($_FILES['image']['name']);
$image_file_type = strtolower(pathinfo($image_path, PATHINFO_EXTENSION));

// Проверяем тип файла
if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    if ($image_file_type == "jpg" || $image_file_type == "png" || $image_file_type == "jpeg" || $image_file_type == "gif") {
        // Создаем директорию, если она не существует
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        // Перемещаем загруженный файл в папку загрузок
        if (move_uploaded_file($_FILES['image']['tmp_name'], $image_path)) {
            // Обновляем запись в базе данных с новым изображением
            $mysqli = new mysqli($server, $user, $pass, $base);
            $update_query = "
                UPDATE products 
                SET 
                    firma='$firma', 
                    model='$model', 
                    image='$image_path', 
                    category_id='$kategoria', 
                    price='$cena' 
                WHERE products_id='$id'
            ";
            $mysqli->query($update_query);

            // Обновляем данные в таблице opis
            $update_opis_query = "
                UPDATE opis 
                SET 
                    wyswietlacz='$wyswietlacz', 
                    procesor='$procesor', 
                    pamiec_wbudowana='$pamiec_wbudowana', 
                    ram='$ram', 
                    komunikacja='$komunikacja' 
                WHERE id = (SELECT opis_id FROM products WHERE products_id = '$id')
            ";
            $mysqli->query($update_opis_query);
        } else {
            echo "Ошибка при загрузке файла.";
        }
    } else {
        echo "Разрешены только файлы JPG, JPEG, PNG и GIF.";
    }
} else {
    // Обновляем запись в базе данных без изменения изображения
    $mysqli = new mysqli($server, $user, $pass, $base);
    $update_query = "
        UPDATE products 
        SET 
            firma='$firma', 
            model='$model', 
            category_id='$kategoria', 
            price='$cena' 
        WHERE products_id='$id'
    ";
    $mysqli->query($update_query);

    // Обновляем данные в таблице opis
    $update_opis_query = "
        UPDATE opis 
        SET 
            wyswietlacz='$wyswietlacz', 
            procesor='$procesor', 
            pamiec_wbudowana='$pamiec_wbudowana', 
            ram='$ram', 
            komunikacja='$komunikacja' 
        WHERE id = (SELECT opis_id FROM products WHERE products_id = '$id')
    ";
    $mysqli->query($update_opis_query);
}

$mysqli->close();
header("Location: index.php");
?>
