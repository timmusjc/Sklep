<?php
include 'dbconfig.php';

$nazwa = $_POST['nazwa'];
$image = $_POST['image'];

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
            $mysqli = mysqli_connect($server,$user,$pass,$base);

            $result = $mysqli->query("INSERT INTO `categories` (`nazwa`, `image`) VALUES ('$nazwa', '$image_path');");







$mysqli->close();
header('Location:./index.php');
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