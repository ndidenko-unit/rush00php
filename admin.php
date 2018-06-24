<?php

    session_start();
    if ($_GET['main'] && $_GET['main'] === "На главную")
    {
        header("Location: index.php");
    }
    if ($_GET['add'] && $_GET['add'] === "Добавить товар")
    {
        header("Location: add.php");
    }
    if ($_GET['delete'] && $_GET['delete'] === 'Удаление')
    {
        header("Location: edit.php");
    }



?>

<html>


<head>
    <meta charset="UTF-8">
    <title>Guns.com</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <center/>
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
    <div class="centerside"><br><br>
           
    <?php if ($_SESSION[login] === 'admin') { ?>
    <form action="admin.php" method="GET">


    <input type="submit" name="main" value="На главную">
    <input type="submit" name="add" value="Добавить товар">
    <input type="submit" name="delete" value="Удаление">

    </form>
    <?php } ?>

        </div>

        </form>


        </fieldset>
    
   

    </div>

</body>

</html>


