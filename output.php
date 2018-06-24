<?php

    session_start();
    $cat = $_GET['value'];
    $conn = mysqli_connect('localhost', 'root', '5956861', "shop");
    $sql = "SELECT * FROM tovars WHERE category='$cat' ";
    $res = mysqli_query($conn, $sql);


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
    <div class="centerside">
        <h1><?php echo $cat; ?></h1>
        <?php while ($row = mysqli_fetch_assoc($res))
        {
            echo "<fieldset class=\"tovar\"><legend>$row[product]</legend><img width='200px' height='200px' src=$row[photo]><br><br>Цена: $row[price]$
            <form action='index.php' method='post'><br><button name = 'button' type=\"submit\" value=\"$row[id]\">
        Добавить в корзину</button></form>
        </fieldset>";
        }?>
    </div>

</body>
</html>
