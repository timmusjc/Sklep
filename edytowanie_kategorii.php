<?php
require_once "functions.php";
$products = getDataKat($_GET["id"]);
?>

<!DOCTYPE html>
<html lang="pl-PL">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edytowanie</title>
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
                <form id="plik" action="edit_kategoria.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
                    <input type="file" name="image" id="imageInput"><br>
                    <img class="the_product_image" id="imagePreview" src="<?= $products['image']; ?>" alt="">
            </div>
        </div>
        
        <div class="edit_opis">
            <input type="text" name="kategoria" id="kategoria" value="<?= $products['nazwa']; ?>" placeholder="Nazwa kategorii">
            <button type="submit" id="dodaj_towar">Zapisz zmiany</button>
        </div>
        </form>
        
        <div class="price"></div>
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
document.getElementById('imageInput').onchange = function(event) {
    const reader = new FileReader();
    reader.onload = function(){
        const output = document.getElementById('imagePreview');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
};
</script>
</body>
</html>
