<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zamówienie</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" href="./images/apple_black.png">
</head>
<body>
<div class="home_page">    
    <?php include("header.php"); ?>
    <div class="main">      

        <div class="koszyk">
            <?php
            include 'dbconfig.php';
            $mysqli = new mysqli($server,$user,$pass,$base);
            
            $result = $mysqli->query("SELECT * FROM koszyk JOIN products ON product_id = products_id");
            $lacznie = 0;
            
            if ($result->num_rows > 0) {
                while($data = $result->fetch_assoc()) {
                    $cena = $data['price'] * $data['ilosc'];
                    $lacznie += $cena;
                }
                ?>
                <div class="container">
                <div class="formularze">
                    <form class="formularze" action="submit_order.php" method="post">
                        <label for="imie">Imię</label><input id="imie" name="imie" type="text"><br>
                        <label for="nazwisko">Nazwisko</label><input id="nazwisko" name="nazwisko" type="text"><br>
                        <label for="adres">Adres dostawy</label><input id="adres" name="adres" type="text"><br>
                        <label for="telefon">Numer telefonu</label><input id="telefon" name="telefon" type="text">
                        <input type="hidden" name="lacznie" value="<?php echo $lacznie; ?>">
                        <div class="dol">
                            <h3>Do zapłaty: <?php echo $lacznie; ?></h3>
                        </div>
                        <div class="price">
                        <button class="price" type="submit">Zamówić</button>
                        </div>
                    </form>
                </div>
                </div>
                <?php
            } else {
                echo "<p>Twój koszyk jest pusty</p>";
            }
            $mysqli->close();
            ?>
        </div>
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
<script src="./js/bootstrap.bundle.min.js"></script>
<script src="./js/jq.js"></script>
<script src="./js/app.js"></script>
</body>
</html>
