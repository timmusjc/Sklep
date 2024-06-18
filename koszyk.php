<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koszyk</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/koszyk.css">

    <link rel="icon" href="./images/apple_black.png">
</head>
<body>
<div class="home_page">    

        <?php
        include("header.php");
        ?>

    <div class="main">                 
            
    <h1>Podsumowanie</h1>

        <div class="koszyk">
                <?php
                include 'dbconfig.php';
                $mysqli = mysqli_connect($server,$user,$pass,$base);
                global $mysqli;
                $result = $mysqli->query("SELECT * FROM koszyk JOIN products ON product_id = products_id");
                $lacznie = 0;
                
                if ($result->num_rows > 0) {
                    while($data = $result->fetch_assoc()) {
                        $cena = $data['price'] * $data['ilosc'];
                        $lacznie = $cena + $lacznie;
                        ?>
                        <div class="border">
                            <div class="product">
                                    <a href="product.php?products_id=<?php echo $data['products_id']; ?>" class="product-link">
                                        <img class="product-image" src="<?php echo $data['image']; ?>">                       
                                        </div>
                                        <h3 id="name"><?php echo $data['firma'] . " " . $data['model'] . " " . $data['memory']; ?></h3>
                                        <div class="product-details">
                                            <h3><?php echo $cena; ?> zł</h3>
                                            </a>
                                            <form method="post" action="update_quantity.php">
                                            Ilość:
                                        <input type="hidden" name="product_id" value="<?php echo $data['products_id']; ?>">
                                        <input type="hidden" name="price" value="<?php echo $data['price']; ?>">

                                        <input type="number" name="ilosc" value="<?php echo $data['ilosc']; ?>" min="1" onchange="this.form.submit()">
                                    </form>
                                    
                                    <!-- <div class="edit"> -->
                                        <a href="remove_from_koszyk.php?id=<?php echo $data['products_id']; ?>">
                                            <img class="edit-icons" src="images/delete-2-svgrepo-com.svg" alt="Usuń">
                                        </a>
                                    <!-- </div> -->
                                </div>
                        </div>
                        <?php
                    }
                    ?>
<div class="lacznie">
    <h3>Lącznie:
    <?php
 echo $lacznie;
 ?></h3>
<form action="zamowienie.php" >
 <br>
<button method="post" type="submit">Przejdź do zamówienia</button>
</form>
<?php


                } else
                echo "<p>Twój koszyk jest pusty</p>";
                $mysqli->close();
                ?>
                </div>
                
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
