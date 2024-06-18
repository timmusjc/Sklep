
<?php 
require_once"functions.php";  
session_start();
include 'dbconfig.php';

$mysqli = new mysqli($server, $user, $pass, $base);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Проверка прав администратора
    $result = $mysqli->query("SELECT * FROM orders ORDER BY id DESC");


?>

<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strona admina</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" href="./images/apple_black.png">
</head>
<body>

<?php
    if(isset($_SESSION['pu']) && ($_SESSION['user']) && ($_SESSION['pu']==1)){ ?>

<div class="home_page">    

<?php
    include("header.php");
?>



    <div class="main">

   

        <div class="container">
           
        <div class="orders-table-container">
        <table class="orders-table">
            <thead>
                <tr>
                    <th>№</th>
                    <th>Imię</th>
                    <th>Nazwisko</th>
                    <th>Adres</th>
                    <th>Telefon</th>
                    <th>Cena</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $id = 0;
                if (isset($result) && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $id = $id +1;
                        echo "<tr>";
                        echo "<td>" . $id . "</td>";
                        echo "<td>" . $row['imie'] . "</td>";
                        echo "<td>" . $row['nazwisko'] . "</td>";
                        echo "<td>" . $row['adres'] . "</td>";
                        echo "<td>" . $row['telefon'] . "</td>";
                        echo "<td>" . $row['cena'] . " zł</td>";
                        echo "<td>" . $row['data'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No orders found</td></tr>";
                }
                $mysqli->close();
                ?>
            </tbody>
        </table>
    </div>
                   

        
            
        </div>   

    </div>    


    <div class="footer">
    <div class="container-1">
        <div class="row">
            <div class="col-md-6">
                <p>&copy; 2024 Jabłka in PL by Tymofii Korzh. <br>All copyrights reserved.</p>
            </div>
            <div class="col-md-6 text-md-right">
                <ul class="social-icons">
                    <li><a href="#"><img src="images/facebook-icon.png" alt="Facebook"></a></li>
                    <li><a href="#"><img src="images/twitter-icon.png" alt="Twitter"></a></li>
                    <li><a href="#"><img src="images/instagram-icon.png" alt="Instagram"></a></li>
                    <!-- Добавьте другие социальные сети по аналогии -->
                </ul>
            </div>
        </div>
    </div>

    </div>

</div>
    <?php
    }
?>

<script src="./js/bootstrap.bundle.min.js"></script>
<script src="./js/jq.js"></script>
<script src="./js/app.js"></script>
</body>
</html>

















