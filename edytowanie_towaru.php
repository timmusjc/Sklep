<?php
require_once "functions.php";
$product_data = getData($_GET["id"]); // Получаем данные товара по ID
$opis_data = getOpisData($product_data['opis_id']); // Получаем данные описания товара по ID

include 'dbconfig.php';
$mysqli = new mysqli($server, $user, $pass, $base);

// Получаем категории
$result = $mysqli->query("SELECT id, nazwa FROM `categories`;");

// Закрываем соединение
$mysqli->close();
?> 

<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodawanie towaru</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" href="./images/apple_black.png">
</head>
<body>
<div class="home_page">    
    <?php include("header.php"); ?>

    <div class="main">                    
        <div class="product_container">
            <div class="the_product">
                <div class="product_image">
                    <form id="plik" action="update_towar.php" method="post" enctype="multipart/form-data">
                        <!-- Добавляем скрытое поле с ID товара -->
                        <input type="hidden" name="id" value="<?= $product_data['products_id']; ?>">
                        <input type="text" placeholder="Firma" name="firma" value="<?= $product_data['firma']; ?>">
                        <input type="text" placeholder="Model" name="model" value="<?= $product_data['model']; ?>">
                        
                        <!-- Загрузка файла -->
                        <input type="file" name="image" id="image-input"><br>
                        <img id="image-preview" class="the_product_image" src="<?= $product_data['image']; ?>" alt="Obraz towaru">
                    </div>
                </div>

                <div class="edit_opis">
                    <span class="pogrubione">Wyświetlacz:
                    <input type="text" name="wyswietlacz" value="<?= $opis_data['wyswietlacz']; ?>"></span>
                    <span class="pogrubione">Procesor:
                    <input type="text" name="procesor" value="<?= $opis_data['procesor']; ?>"></span>
                    <span class="pogrubione">Pamięć wbudowana:
                    <input type="text" name="pamiec_wbudowana" value="<?= $opis_data['pamiec_wbudowana']; ?>"></span>
                    <span class="pogrubione">Pamięć RAM:
                    <input type="text" name="ram" value="<?= $opis_data['ram']; ?>"></span>
                    <span class="pogrubione">Komunikacja:
                    <input type="text" name="komunikacja" value="<?= $opis_data['komunikacja']; ?>"></span>
                    
                    Kategoria towaru
                    <select name="kategoria">
                        <?php foreach($result as $data): ?>
                        <option value="<?=$data['id'];?>" <?php if($data['id'] == $product_data['category_id']) echo 'selected'; ?>>
                            <?=$data['nazwa'];?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                    Nie masz właściwej kategorii? <a href="dodawanie_kategorii.php">Dodaj ją tutaj!</a> 
                </div>
                
                <div class="price">
                    <p>
                    <input id="small" type="text" placeholder="Cena" name="cena" value="<?= $product_data['price']; ?>"> zł</p><br>
                    <button type="submit" id="dodaj_towar">Zapisz zmiany</button>
                </div>
            </form>
        </div>

        <div class="footer">
        <div class="container-1">
        <div class="row">
            <div class="col-md-6 ">
                <p>&copy; 2024 Jabłka in PL by Tymofii Korzh. <br>All copyrights reserved.</p>
            </div>
            <div class="col-md-6 text-md-right">
               
            </div>
        </div>
    </div>

    </div>
        </div>
    </div>
</div>

<script src="./js/bootstrap.bundle.min.js"></script>
<script src="./js/jq.js"></script>
<script src="./js/app.js"></script>
<script>
document.getElementById('image-input').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('image-preview').src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
});
</script>
</body>
</html>
