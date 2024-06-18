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


<h1>Kategorie</h1>
    <?php 

                        
if(isset($_SESSION['pu']) && ($_SESSION['user']) && ($_SESSION['pu']==1)){ ?>
    <form action="dodawanie_kategorii.php">
    <div class="edytowac">
                        <button class="przycisk">Dodać nową kategorię</button>
    </div>
    </form>
    
<?php
}
?>
        <div class="categories">
            <div class="row">
                <?php
                    include 'dbconfig.php';
                    global $mysqli;
                    $result = $mysqli->query("SELECT * FROM `categories` ORDER BY `id` DESC");
                    
                    $result->fetch_assoc();
                    foreach($result as $data): ?>
                        <div class="col-sm-3">
                            <div class="row">
                                <a href="category.php?id=<?php echo $data['id']; ?>">
                                    <div class="powloka">
                                        <img class="product" src="<?php echo $data['image']; ?>">   
                                    </div> 
                                        <div class="napis">
                                            <h4 class="text-center"><?= $data['nazwa']; ?></h4>
                                        </div>
                                </a>
                                    <?php                         
                                        if(isset($_SESSION['pu']) && ($_SESSION['user']) && ($_SESSION['pu']==1)){
                                    ?>
                                <div class="edit">
                                    <a href="delete_kategoria.php?id=<?php echo $data['id']; ?>">
                                        <img class="edit_icons" src="images/delete-2-svgrepo-com.svg" alt="Usuń">
                                    </a>
                                    <a href="edytowanie_kategorii.php?id=<?php echo $data['id']; ?>">
                                        <img class="edit_icons" src="images/edit-3-svgrepo-com.svg" alt="Edytuj">
                                    </a>
                                </div>
                            <?php }?>
                            </div>
                        </div>
                    <?php endforeach; ?>
            </div>
        </div>

        <?php                         
        if(isset($_SESSION['pu']) && ($_SESSION['user']) && ($_SESSION['pu']==1)){ ?>
            <form action="dodawanie_towaru.php">
            <div class="edytowac">
                <button type="submit" class="przycisk">Dodać nowy towar</button> 
            </div>
            </form> 
            
            <?php
                }
                ?>
                <div class="container">
                    <div class="row">
<?php
                $products = getData(null);
                foreach($products as $data): ?>
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
                        <?php                         
                        if(isset($_SESSION['pu']) && ($_SESSION['user']) && ($_SESSION['pu']==1)){
                            ?>
                            <div class="edit">
                                <a href="delete_towar.php?id=<?php echo $data['products_id']; ?>">
                                    <img class="edit_icons" src="images/delete-2-svgrepo-com.svg" alt="Usuń">
                                </a>
                                <a href="edytowanie_towaru.php?id=<?php echo $data['products_id']; ?>">
                                    <img class="edit_icons" src="images/edit-3-svgrepo-com.svg" alt="Edytuj">
                                </a>
                            </div>
                        
<?php
            }
?>
                
                    </div>
                    </div>
                    </div>
                <?php endforeach; 
                //$mysqli->close();?>

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

<script src="./js/bootstrap.bundle.min.js"></script>
<script src="./js/jq.js"></script>
<script src="./js/app.js"></script>
</body>
</html>