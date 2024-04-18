<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-signin-client_id" content="175111029591-vchtmsv3js1ih6c8ugrdo3gdq97pbvcq.apps.googleusercontent.com">

    <title>Log in</title>
    <!-- <link rel="stylesheet" href="./css/reset.css"> -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="icon" href="./images/apple_black.png">
</head>
<body>


    <div class="log_page">
        <div class="logo_block">
            <div class="logo">
                <a href="index.php" alt="Home">
                <img src="./images/apple.png" alt="Home" id="logo" href="index.php">
                </a>
            </div>
                <div class="nazwa">
                <a class="link" href="index.php" alt="Home">
                    
                    <h1 id="nazwa">Jabłka in PL</h1>
                </a>
                </div>
        </div>
        
            <div class="log_form">
                        <h2>Logowanie</h2>
                        <br>
                        <form action="login.php" method="post">
                        Login
                        <br>
                        <input  type="text" placeholder="Login" name="login">
                        <br>
                        Hasło
                        <br>
                        <input id="pass" type="password" placeholder="Hasło" name="pass">
                        <br>
                        <br>
                        <button type="submit" id="button1">Zaloguj się</button>
                        </form>
                        <br>
                        <br>
                        <div class="g-signin2" data-onsuccess="onSignIn" id="google_login"></div>
                        <br>
                        Nie masz jeszcze konta?
                        <a href="rejestracja.php">Zarejestruj się</a>
            </div>
    </div>

<script src="https://apis.google.com/js/platform.js" async defer></script>
<script src="./js/bootstrap.bundle.min.js"></script>
<script src="./js/jq.js"></script>
<script src="./js/app.js"></script>
</body>
</html>

