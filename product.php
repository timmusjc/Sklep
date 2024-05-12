<?php
require_once"functions.php";
    $products = getData($_GET["products_id"]);
    $title = $products['firma'] . "&nbsp" . $products['model'] . "&nbsp" . $products['memory'] . "&nbsp" . $products['colour'];
?>

<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title;?></title>
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
                <h1><?= $products['firma']; echo "&nbsp";  echo $products['model']; echo "&nbsp"; echo $products['memory'];?></h1>
                <div class="product_image">
                    <img class="the_product_image" src="<?php echo $products['image']; ?>">
                </div>
            </div>

            <div class="opis">
                <span class="pogrubione">Wyświetlacz:</span> <?php echo $products['wyswietlacz']; ?> <br>
                <span class="pogrubione">Procesor:</span> <?php echo $products['procesor']; ?> <br>
                <span class="pogrubione">Pamięć wbudowana:</span> <?php echo $products['pamiec_wbudowana']; ?> <br>
                <span class="pogrubione">Pamięć RAM:</span> <?php echo $products['ram']; ?> <br>
                <span class="pogrubione">Komunikacja:</span> <?php echo $products['komunikacja']; ?> <br>

            </div>

            <div class="price">
                <p><?= $products['price']; ?> zł</p>
                <button type="submit" id="">KUPIĆ</button>
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