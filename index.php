<?php

include "install.php";
include "check_login.php";
include "check_pass.php";
include "str_db.php";
$login = $_POST['login'];
$password = hash('whirlpool', $_POST['password']);

session_start();
if ($_POST['submit'] && $_POST['submit'] === "OK")
{
    if (!$_POST['login'] || !$_POST['password']){$_SESSION['msgerrornodata'] =
        "Неверные логин или пароль"; header("Location: index.php");}
    $conn = mysqli_connect('localhost', 'root', '5956861', "shop");
    if (!$conn) {die("Connection failed: " . mysqli_connect_error());}
    $sql = "SELECT * FROM users";
    if (!check_login($sql, $conn, $login))
    {
        if (!check_pass($sql, $conn, $password, $login)){$_SESSION['msgerrornodata'] =
            "Неверные логин или пароль"; header("Location: index.php");}
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

if (isset($_POST['button']))
{
    $sql2 = "SELECT * FROM tovars WHERE id='$_POST[button]'";
    $row2 = str_db($sql2, $conn);
    $product = $row2['product'];
    $cat = $row2['category'];
    $price = $row2['price'];
    $photo = $row2['photo'];
    $sql2 = "INSERT INTO busket (id, product, category, price, photo)
            VALUES (id, '$product', '$cat', '$price', '$photo')";
    if (mysqli_query($conn, $sql2)) {
        header("Location: index.php");
    }
}
if (isset($_POST['button2']))
{
    $sql2 = "DELETE FROM busket WHERE id='$_POST[button2]'";
    if (mysqli_query($conn, $sql2)) {
        header("Location: index.php");
    }
}

?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Guns.com</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <center>
    <div class="up">
    <img class="logo" src="https://cs9.pikabu.ru/images/previews_comm/2017-03_6/14908654351521703.png" alt="logo" title="Logo" align="left">
    <h1><a href="index.php">Guns.com</a></h1>
    <ul class="menu">
            <li><a href="output.php?value=Гранаты" name='Гранаты'>Гранаты</a>
            </li>
            <li><a href="output.php?value=Пистолеты" name='Пистолеты'>Пистолеты</a>
            </li>
            <li><a href="output.php?value=Дробовики" name='Дробовики'>Дробовики</a>
            </li>
            <li><a href="output.php?value=Винтовки" name='Винтовки'>Винтовки</a>
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
            <legend>Вы авторизованы </legend>
            Добро пожаловать, <?php echo "$_SESSION[login]" ?>
            <li><a href="change_pass.php">Сменить пароль</a></li>
            <li><a href="logout.php">Выйти</a></li>
            <?php } ?>
        </form>
        <?php if (!isset($_SESSION[login])) { ?>
        <form method="get" action="registration.php">
            <input type="submit" name="submit" value="Registration"/>
        </form>
        <?php } ?>
        <?php if ($_SESSION[login] === 'admin') { ?>
            <li><a href = "admin.php">Администрирование</a></li>
        <?php } ?>

        </fieldset>
</div>

<div class="down">
    <a href="order.php"><img class="basket" src="https://www.montagcenter.com.ua/upload/medialibrary/363/3631035d22a99c1bab1fcb66108f8b1f.png"
     alt="logo" title="Logo" align="left"></a>

<?php
$cat = $_GET['value'];
$conn = mysqli_connect('localhost', 'root', '5956861', "shop");
$sql = "SELECT * FROM busket";
$res = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($res))
{
echo "<fieldset class=\"product\"><legend>$row[product]</legend><img width='50px' height='50px'
src=$row[photo]><br>Цена: $row[price]<br><br><form action='index.php'
method='post'><button name = 'button2' type=\"submit\" value=\"$row[id]\">Удалить</button></form>
</fieldset>";
}?>
</div>

        <div class="centerside">
        <h1>Все товары</h1>
    <?php
    $cat = $_GET['value'];
    $conn = mysqli_connect('localhost', 'root', '5956861', "shop");
    $sql = "SELECT * FROM tovars";
    $res = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($res))
    {
        echo "<fieldset class=\"tovar\"><legend>$row[product]</legend><img width='200px' height='180px'
        src=$row[photo]><br><br>Категория: $row[category]<br><br>Цена: $row[price]$<br><br>
        <form action='index.php' method='post'><button name = 'button' type=\"submit\" value=\"$row[id]\">
        Добавить в корзину</button></form>
        </fieldset>";
    }?>
        </div>
</body>
</html>
