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
            
            </div>
            
            
            <a href="koszyk.php">
                <img class="icon" src="images/shop-bag-svgrepo-com.svg" alt="koszyk">
            </a>
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
                                echo "<div class='test'>Witaj: ".$_SESSION['user']." <a href='logout.php'>Exit</a> </div>";
                                echo "<div class='test'><a href='admin.php'>Panel admina</a> </div>";

                            };
                        
                        ?>

                  </div>
                 

        </div>
    </div>