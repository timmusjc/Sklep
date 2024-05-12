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
                        elseif(isset($_SESSION['pu']) && ($_SESSION['user']) && ($_SESSION['pu']==0)){
                            echo "<div class='test'>Witaj: ".$_SESSION['user']." <a href='logout.php'>Exit</a> </div>";
                            }else{
                                echo "<div class='test'>JA ADMINNN  <a href='logout.php'>Exit</a> </div>";
                            };
                        
                        ?>

                  </div>
                 

        </div>
    </div>