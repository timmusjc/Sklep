<!-- <?php
require_once"functions.php";
$products = getData($_GET["products_id"]);
$title = $products['firma'] . "&nbsp" . $products['model'] . "&nbsp" . $products['memory'] . "&nbsp" . $products['colour'];
?> -->

<!DOCTYPE html>
<html lang="pl-PL">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dodawanie kategorii</title>
<link rel="stylesheet" href="./css/bootstrap.min.css">
<link rel="stylesheet" href="./css/header.css">
<link rel="stylesheet" href="./css/style.css">
<link rel="icon" href="./images/apple_black.png">
</head>
<body>
<div class="home_page">    
<?php
include("header.php");
?>

<div class="main">                    
    <div class="product_container">
        <div class="the_product">
                <div class="product_image">
                    <form action="add_kategoria.php" method="post">
                    <input type="text" placeholder="Ścieżka do pliku" name="image"><br>
                    

                    <img src="images/twoj_obraz.png" alt="">
                </div>
            </div>
            
            <div class="edit_opis">
                <input type="text" name="nazwa" id="" placeholder="Dodaj kategorię">
                <button type="submit" id="dodaj_towar">Dodaj kategorię</button>
            </div>
        </form>
                
            
            
            <div class="price">
                


            </div>
        

    </div>

    <div class="footer">
    
    </div>

</div>
</div>

<script src="./js/bootstrap.bundle.min.js"></script>
<script src="./js/jq.js"></script>
<script src="./js/app.js"></script>
</body>
</html>