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

    <div class="header">
        <div class="logo_block">
            <div class="logo">
                <a href="index.php" alt="Home">
                <img src="./images/apple.png" alt="Home" id="logo" href="index.php">
                </a>
            </div>
                <div class="nazwa">
                    <a class="link" href="index.php" alt="Home">
                        <h1 class="nazwa">Jabłka in PL</h1>
                    </a>
                </div>
        </div>  

            <div class="icons">  
                <a href="wyszukiwanie.php">
                    <img class="icon" src="images/search-svgrepo-com.svg" alt="polubione">
                </a> 
                <a href="polubione.php">
                    <img class="icon" src="images/heart-svgrepo-com.svg" alt="polubione">
                </a>

                <a href="koszyk.php">
                    <img class="icon" src="images/shop-bag-svgrepo-com.svg" alt="koszyk">
                </a>
            </div>

            <div class="dropdown">
                    <button class="dropbtn">
                        <img id="konto" src="images/account-svgrepo-com.svg" alt="konto">
                    </button>

                <div class="dropdown-content">
                    

                    <?php   
                    session_start();
                    if(!isset($_SESSION['user'])){
                    echo "
                    <a href='logowanie.php'>Log in</a>
                    <a href='rejestracja.php'>Sign up</a>";
                    }

                    else
                        
                        echo "<div class='test'>Witaj: ".$_SESSION['user']." <a href='logout.php'>Exit</a> </div>)";
                        
                    ?>


                    
                </div>
            </div>  
    </div>


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
                                <div class="col-sm-4">
                                    <a href="product.php?products_id=<?php echo $data['products_id']; ?>">
                                     <img class="product" src="<?php echo $data['image']; ?>">        
                                    <p><?= $data['firma']; echo "&nbsp";  echo $data['model']; echo "&nbsp"; echo $data['memory'];?></p>
                                    <p><?= $data['price']; ?> zł</p>
                                    </a>

                                </div>

                            <?php endforeach; ?>
            </div>
            
            
        </div>
    </div>

    <div class="footer">
        

    </div>

</div>

<script src="./js/bootstrap.bundle.min.js"></script>
<script src="./js/jq.js"></script>
<script src="./js/app.js"></script>
</body>
</html>