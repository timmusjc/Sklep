<?php
session_start();
include 'dbconfig.php';

// Получаем данные из POST запроса
$id = $_POST['id'];
$kategoria = $_POST['kategoria'];

// Обрабатываем загрузку файла
$upload_dir = 'uploads/';
$image_path = $upload_dir . basename($_FILES['image']['name']);
$image_file_type = strtolower(pathinfo($image_path, PATHINFO_EXTENSION));

$uploadOk = 1;

// Проверяем тип файла
if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    if ($image_file_type == "jpg" || $image_file_type == "png" || $image_file_type == "jpeg" || $image_file_type == "gif") {
        // Создаем директорию, если она не существует
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        // Перемещаем загруженный файл в папку загрузок
        if (move_uploaded_file($_FILES['image']['tmp_name'], $image_path)) {
            $uploadOk = 1;
        } else {
            echo "";
            $uploadOk = 0;
        }
    } else {
        echo "";
        $uploadOk = 0;
    }
} else {
    $uploadOk = 0;
    $image_path = "";  // Set image_path to an empty string if no new image is uploaded
}

if ($uploadOk) {
    // Обновляем запись в базе данных с новым изображением
    $mysqli = new mysqli($server, $user, $pass, $base);
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Prepare the update query
    $update_query = "UPDATE categories SET nazwa=?, image=? WHERE id=?";
    $stmt = $mysqli->prepare($update_query);
    if ($stmt) {
        $stmt->bind_param("ssi", $kategoria, $image_path, $id);
        $stmt->execute();
        $stmt->close();
    } else {
        echo "Ошибка при подготовке запроса: " . $mysqli->error;
    }

    $mysqli->close();
    header("Location: index.php");
} else {
    echo "Ошибка при обновлении данных.";
}
?>
