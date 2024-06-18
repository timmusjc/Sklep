<?php

include 'dbconfig.php';
$mysqli = mysqli_connect($server,$user,$pass,$base);
$result = $mysqli->query("SELECT id, nazwa FROM  `categories`;");

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
<?php
    include("header.php");
?>

    <div class="main">                    
        <div class="product_container">
            <div class="the_product">
                
                <div class="product_image">
                    <form id="plik" action="add_towar.php" method="post" enctype="multipart/form-data">
                    <input type="text" placeholder="Firma" name="firma">
                    <input type="text" placeholder="Model" name="model">
                    
                        <input id="plik"  type="file" name="image"><br>
                    

                        <img src="images/twoj_obraz.png" alt="">
                    </div>
                </div>

                <div class="edit_opis">
                    <span class="pogrubione">Wyświetlacz:</span><input  type="text" name="wyswietlacz"> <br>
                    <span class="pogrubione">Procesor:</span><input  type="text" name="procesor"> <br>
                    <span class="pogrubione">Pamięć wbudowana:</span><input  type="text" name="memory"> <br>
                    <span class="pogrubione">Pamięć RAM:</span><input  type="text" name="ram"> <br>
                    <span class="pogrubione">Komunikacja:</span><input  type="text" name="komunikacja">  <br>
                    <br>
                    <br>
                    Kategoria towaru
                    <select name="kategoria" id="">
                        <?php
                        $result->fetch_assoc();
                        foreach($result as $data): ?>
                        <option value="<?=$data['id'];?>"><?=$data['nazwa'];?></option>

                        <?php endforeach; ?>
                    </select>
                            Nie masz właściwej kategorii? <a href="dodawanie_kategorii.php">Dodaj ją tutaj!</a> 
                </div>
                
                
                
                <div class="price">
                    <input id="small" type="number" placeholder="Cena" name="cena"> zł<br>
                    <button type="submit" id="dodaj_towar">Dodaj towar</button>
                </form>

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
</div>


<script src="./js/bootstrap.bundle.min.js"></script>
<script src="./js/jq.js"></script>
<script src="./js/app.js"></script>
</body>
</html>