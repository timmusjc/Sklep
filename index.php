<?php
require_once"functions.php";                    
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

    <?php 

                        
if(isset($_SESSION['pu']) && ($_SESSION['user']) && ($_SESSION['pu']==1)){ ?>
    <form action="dodawanie_kategorii.php">
    <div class="edytowac">
                        <button class="przycisk">Dodać nową kategorię</button></div>
    </form>

<?php
}
?>

        <div class="categories">
            <h2 class="text-center">Kategorie</h2>
            <div class="row">
                <?php
                    include 'dbconfig.php';
                    global $mysqli;
                    $result = $mysqli->query("SELECT * FROM `categories` ORDER BY `id` DESC");
                    // $mysqli->close();
                    $result->fetch_assoc();
                    foreach($result as $data): ?>
                        <div class="col-sm-3 category">
                            <a href="category.php?id=<?php echo $data['id']; ?>">
                            <img class="category" src="<?php echo $data['image']; ?>">                       
                                <h3 class="text-center"><?= $data['nazwa']; ?></h3>
                            </a>
                        </div>
                    <?php endforeach; ?>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <?php 

                        
                if(isset($_SESSION['pu']) && ($_SESSION['user']) && ($_SESSION['pu']==1)){ ?>
                    <form action="dodawanie_towaru.php">
                    <div class="edytowac">
                        <button type="submit" class="przycisk">Dodać nowy towar</button> </div>
                    </form> 
<?php
                }
?>
<?php
                $products = getData(null);
                foreach($products as $data): ?>
                    <div class="col-sm-3">
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