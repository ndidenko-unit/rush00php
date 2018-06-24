
<?php
    session_start();
    $_SESSION['msgerrornodata'] = "";
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
                    <legend>Введите логин и пароль </legend><br>
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
        <?php if ($_SESSION[login] === 'admin') { ?>
            <li><a href = "admin.php">Администрирование</a></li>
        <?php } ?>
        </fieldset>
    </div>
    <div class="centerside"><br><br>
        <h1>Смена пароля:</h1><br><br>
        <fieldset class="newpass">
            <form action="change_pass.php" method="post"><br>
                <div class="left_newlog">
                    Пароль: <br><br>
                    Повторно: <br><br>
                    Новый пароль: <br><br>
                    <input type="submit" name="submit" value="Подтвердить">
                </div>
                <div class="right_newlog">
                    <input type = "password" name = "password"><br><br>
                    <input type = "password" name = "conf_pass"><br><br>
                    <input type="password" name="new"><br><br>
                    <input type="submit" name = "back" value="Назад">
                </div>

            </form>


        </fieldset>


        <?php

            $new = $_POST['new'];
            $old_1 = hash('whirlpool', $_POST['password']);
            $old_2 = hash('whirlpool', $_POST['conf_pass']);
            if ($_POST['submit'] && $_POST['submit'] === "Подтвердить")
            {
                if ($new && $old_1 && $old_2)
                {
                    session_start();
                    foreach ($_SESSION as $tmp);
                    $conn = mysqli_connect('localhost', 'root', '12345678', "shop");
                    $sql = "SELECT password FROM users WHERE login='$tmp'";
                    $res = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($res);
                    if ($old_1 != $old_2){echo "Пароли не совпадают";}
                    else if ($old_1 != $row['password']){echo "Неверный пароль";}
                    else if ($old_1 == hash('whirlpool', $new)){echo "Старый пароль совпадает с новым";}
                    else if (strlen($new) < 5){echo "Слишком простой пароль(мин. 5 символов)";}
                    else
                    {
                        $new = hash('whirlpool',$new);
                            $sql2 ="UPDATE users SET password='$new' WHERE login='$tmp'";
                        $res = mysqli_query($conn, $sql2);
                        if ($res){echo "Пароль успешно изменен";}
                    }
                }
                else {echo "Заполните все пустые поля";}


            }

        ?>

    </div>
</body>
</html>
