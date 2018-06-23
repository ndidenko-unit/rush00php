<?php

include "install.php";
include "check_login.php";
include "check_pass.php";
include "str_db.php";
$login = $_POST['login'];
$password = hash('whirlpool', $_POST['password']);

session_start();

if ($_GET['submit'] && $_GET['submit'] === "New user")
{
    header("Location: registration.php");
}

if ($_POST['submit'] && $_POST['submit'] === "Sign in")
{
    if (!$_POST['login'] || !$_POST['password']){die("Enter log and pass");}
    $conn = mysqli_connect('localhost', 'root', '12345678', "shop");
    if (!$conn) {die("Connection failed: " . mysqli_connect_error());}
    $sql = "SELECT * FROM users";
    if (!check_login($sql, $conn, $login))
    {
        if (!check_pass($sql, $conn, $password, $login)){die("Incorrect password");}
        else
        {
            $sql = "SELECT id FROM users where login = '$login'";
            $row = str_db($sql, $conn);
            $_SESSION['login'] = $login;
            $_SESSION['id'] = $row[id];
            print_r("$_SESSION");
        }
    }
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
        <h1>КупиХуйню.com</h1>
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
                        <legend>Введите логин и пароль </legend><br>
                        Логин: <input type = "text" name = "login" value = "">
                        Пароль: <input type = "password" name = "password" value = "">
                        <input type = "submit" name = "submit" value = "OK">
                        <br><br>
                    
                    </form>
                    <form method="get" action="registration.php">
                        <input type="submit" name="submit" value="Registration"/>
                    </form>
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
