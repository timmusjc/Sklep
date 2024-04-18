<?php
                    $mysql = new mysqli('localhost', 'Timofey', 'Astra2007!','sklep');
                    $info = [];


                   



                    if($result = $mysql->query("SELECT * FROM products")){
                        while ($row = $result->fetch_assoc()) {
                            $info[] = $row;
                        }
                    } else {
                        print_r($mysql->errorInfo());
                    }

                

?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['firma'];  echo $data['model']; echo $data['memory']; ?></title>
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

                        <?php   
                        session_start();
                        echo "
            <ul class='menu'>
                <li id='main_icon'>
                    <img id='konto' src='images/account-svgrepo-com.svg' alt='konto'>
                    <ul>";
                        if(!isset($_SESSION['user'])){
                        echo "
                        <li><a href='logowanie.php'>Log in</a></li>
                        <li><a href='rejestracja.php'>Sign up</a></li>";
                        }

                        else
                            echo "<li>Witaj: ".$_SESSION['user']."</li> (<li><a href='logout.php'>Exit</a></li>)";
                        ?>

                    </ul>
                </li>
            </ul>

        </div>
</div>

<div class="container">
        <?php foreach($info as $data): ?>
            
                <a href="product.php">
                    <img class="product" src="<?php echo $data['image']; ?>">
            <p><?= $data['firma']; echo "&nbsp";  echo $data['model']; echo "&nbsp"; echo $data['memory'];?></p>
            <p><?= $data['price']; ?> zł</p>
            </a>

        <?php endforeach; ?>
    
    
</div>
        


<div class="footer">
    

</div>

</div>









<script src="./js/bootstrap.bundle.min.js"></script>
<script src="./js/jq.js"></script>
<script src="./js/app.js"></script>
</body>
</html>