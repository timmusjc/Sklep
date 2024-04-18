<?PHP
$login = filter_var(trim($_POST['login']),
FILTER_SANITIZE_STRING);

$pass = filter_var(trim($_POST['pass']),
FILTER_SANITIZE_STRING);

$repeat_pass = filter_var(trim($_POST['repeat_pass']),
FILTER_SANITIZE_STRING);

if(mb_strlen($login) < 3 || mb_strlen($login) > 50) {
    echo "Minimalna długość loginu- 3 znaki, <br/>";
    echo "Maksymalna- 50!";
    exit();
}else if(mb_strlen($pass) < 3 || mb_strlen($pass) > 50) {
    echo "Minimalna długość hasła- 4 znaki, <br/>";
    echo "Maksymalna- 25!";
    exit();
}else if($pass != $repeat_pass){
    echo "Hasła się nie zgadzają!!!";
    exit();
}

$pass = md5($pass."gjfvjhgyf576547");

$mysql = new mysqli('localhost', 'Timofey', 'Astra2007!','sklep');
$mysql->query("INSERT INTO `users` (`login`, `pass`) VALUES('$login', '$pass')");

$mysql->close();

header('Location:./logowanie.php');
?>