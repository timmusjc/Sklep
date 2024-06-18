<?php
require_once"functions.php";   
$category_id = $_GET["id"];                 
?>

<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jablka in PL</title>
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

        <div class="container">
            <div class="row">
                             <?php
                            include 'dbconfig.php';
                            global $mysqli;
                            $result = $mysqli->query("SELECT * FROM `products` WHERE `category_id` = $category_id  ORDER BY `category_id` DESC");
                            // $mysqli->close();
                            $result->fetch_assoc();
                            foreach($result as $data): ?>
                                <div class="col-md-3">
                                    <div class="row">
                                    <a href="product.php?products_id=<?php echo $data['products_id']; ?>">
                                        <div class="powloka">
                                     <img class="product" src="<?php echo $data['image']; ?>">      
                                     </div>  
                                     <div class="product">
                                    <h5><?= $data['firma']; echo "&nbsp";  echo $data['model']; echo "&nbsp"; echo $data['memory'];?></h5>
                                    <h5 id="cena"><?= $data['price']; ?> zł</h5>
                                    </a>
                                    <form method="post" action="add_to_koszyk.php?id=<?php echo $data['products_id']; ?>">
                            <button class="do_koszyka" type="submit">Dodaj do koszyka</button>
                        </form>

                                </div>
                                </div>
                                </div>
                            <?php endforeach; ?>
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