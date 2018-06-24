<?php

include "install.php";
include "check_login.php";
include "check_pass.php";
include "str_db.php";
// include "logout.php";
$login = $_POST['login'];
$password = hash('whirlpool', $_POST['password']);

session_start();
if ($_POST['submit'] && $_POST['submit'] === "OK")
{
    if (!$_POST['login'] || !$_POST['password']){$_SESSION['msgerrornodata'] = "Неверные логин или пароль"; header("Location: index.php");}
    $conn = mysqli_connect('localhost', 'root', '5956861', "shop");
    if (!$conn) {die("Connection failed: " . mysqli_connect_error());}
    $sql = "SELECT * FROM users";
    if (!check_login($sql, $conn, $login))
    {
        if (!check_pass($sql, $conn, $password, $login)){$_SESSION['msgerrornodata'] = "Неверные логин или пароль"; header("Location: index.php");}
        else
        {
            $sql = "SELECT id FROM users where login = '$login'";
            $row = str_db($sql, $conn);
            $_SESSION['login'] = $login;
            $_SESSION['id'] = $row[id];
            $message = "Добро пожаловать, $login";
            $_SESSION['msgerrornodata'] = "";
        }
    }
}

if ($_GET['submit'] && $_GET['submit'] === "New user")
{
    header("Location: registration.php");
}

?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>КупиХуйню.com</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <center>
    <div class="up">
        <img class="logo" src="https://cs9.pikabu.ru/images/previews_comm/2017-03_6/14908654351521703.png" alt="logo" title="Logo" align="left">
        <h1><a href="index.php">КупиХуйню.com</a></h1>
        <ul class="menu">
                <li><a href=#>Хуйня высшего сорта</a>
                    <ul class="submenu">
                        <li><a href=#>Sudmenu 1</a></li>
                        <li><a href=#>Sudmenu 1</a></li>
                        <li><a href=#>Sudmenu 1</a></li>
                    </ul>
                </li>
                <li><a href=#>Хуйня первого сорта</a>
                    <ul class="submenu">
                        <li><a href=#>Sudmenu 2</a></li>
                        <li><a href=#>Sudmenu 2</a></li>
                        <li><a href=#>Sudmenu 2</a></li>
                    </ul>
                </li>
                <li><a href=#>Хуйня второго сорта</a>
                    <ul class="submenu">
                        <li><a href=#>Sudmenu 3</a></li>
                        <li><a href=#>Sudmenu 3</a></li>
                        <li><a href=#>Sudmenu 3</a></li>
                    </ul>
                </li>
                <li><a href=#>Хуйня третего сорта</a>
                    <ul class="submenu">
                        <li><a href=#>Sudmenu 4</a></li>
                        <li><a href=#>Sudmenu 4</a></li>
                        <li><a href=#>Sudmenu 4</a></li>
                    </ul>
                </li>
            </ul>
    </div>
    <div class="loginform">
            <form name = "index.php" method = "POST" action = "index.php">
                    <fieldset class="log">
                    <?php if (!isset($_SESSION[login])) { ?>
                        <legend>Введите логин и пароль </legend>
                        <font color="red"><?php echo "$_SESSION[msgerrornodata]"; ?></font><br>
                        Логин: <input type = "text" name = "login" value = "">
                        Пароль: <input type = "password" name = "password" value = "">
                        <input type = "submit" name = "submit" value = "OK">
                        <br><br>
                        <?php } else { ?>
                        <legend>Вы авторизованы </legend><br>
                        Добро пожаловать, <?php echo "$_SESSION[login]" ?>
                        <li><a href="logout.php">logout</a></li>
                        <?php } ?>
                    </form>
                    <?php if (!isset($_SESSION[login])) { ?>
                    <form method="get" action="registration.php">
                        <input type="submit" name="submit" value="Registration"/>
                    </form>
                    <?php } ?>

                    </fieldset>
        </div>
    <div class="centerside">
            <h1>Хуевые товары</h1>
            <fieldset class="product"><legend>Граната F1</legend><img src="img/grenade_f1_b.jpg"><br></fieldset>
            <fieldset class="product"><legend>Граната F1</legend><img src="img/grenade_f1_b.jpg"><br></fieldset>
            <fieldset class="product"><legend>Граната F1</legend><img src="img/grenade_f1_b.jpg"><br></fieldset>
            <fieldset class="product"><legend>Граната F1</legend><img src="img/grenade_f1_b.jpg"><br></fieldset>
            <fieldset class="product"><legend>Граната F1</legend><img src="img/grenade_f1_b.jpg"><br></fieldset>
            <fieldset class="product"><legend>Граната F1</legend><img src="img/grenade_f1_b.jpg"><br></fieldset>
            <fieldset class="product"><legend>Граната F1</legend><img src="img/grenade_f1_b.jpg"><br></fieldset>
            <fieldset class="product"><legend>Граната F1</legend><img src="img/grenade_f1_b.jpg"><br></fieldset>
            <fieldset class="product"><legend>Граната F1</legend><img src="img/grenade_f1_b.jpg"><br></fieldset>
            <fieldset class="product"><legend>Граната F1</legend><img src="img/grenade_f1_b.jpg"><br></fieldset>
            <fieldset class="product"><legend>Граната F1</legend><img src="img/grenade_f1_b.jpg"><br></fieldset>
            <fieldset class="product"><legend>Граната F1</legend><img src="img/grenade_f1_b.jpg"><br></fieldset>
    </div>
 
    <div class="down">
            <img class="basket" src="https://www.montagcenter.com.ua/upload/medialibrary/363/3631035d22a99c1bab1fcb66108f8b1f.png" alt="logo" title="Logo" align="left">
            <h1>Хуйня, которую вы купили</h1>
    </div>
</body>
</html>
