

<!-- <html>
<form action="registration.php" method="post">
    <p>Login:</p>
    <input type="text" name="login" placeholder="login"/>
    <br />
    <p>Password:</p>
    <input type="password" name="password" placeholder="password">
    <p>Confirm password:</p>
    <input type="password" name="conf_pass" placeholder="confirm">
    <input type="submit" name="submit" value="Accept">
    <p><input type="submit" name = "back" value="Go back"></p>
</form>
</html> -->
<?php 
    session_start();
    $_SESSION['msgerrornodata'] = ""; 
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
            </fieldset>
</div>
    <div class="centerside"><br><br>
            <h1>Регистрация:</h1><br><br>
            <fieldset class="newpass">
            <form action="registration.php" method="post"><br>
            <div class="left_newlog">
            Логин: <br><br>
            Пароль: <br><br>
            Повторно: <br><br><br>
            <input type="submit" name="submit" value="Accept">
            </div>
            <div class="right_newlog">
            <input type = "text" name = "login"><br><br>
            <input type = "password" name = "password"><br><br>
            <input type = "password" name = "conf_pass"><br><br><br>
            <input type="submit" name = "back" value="Go back">

        </div>

        </form>


        </fieldset>
    


    <?php
    include "error.php";
    include "check_login.php";
    $login = $_POST['login'];
    $password = hash('whirlpool', $_POST['password']);

    if ($_POST['submit'] && $_POST['submit'] === "Accept")
    {
        if ($_POST['login'] && $_POST['password'] && $_POST['conf_pass'])
        {
            $_POST['password'] != $_POST['conf_pass'] ? error("Passwords do not match") : 0;
            strlen($_POST['password']) < 5 ? error("Short password(min 6)") : 0;
            $conn = mysqli_connect('localhost', 'root', '5956861', "shop");
            if (!$conn)
            {
                die("Connection failed: " . mysqli_connect_error());
            }
            $sql2 = "SELECT login FROM users";
            if (!check_login($sql2, $conn, $login)){die("User exist");}
            $sql = "INSERT INTO users (id, login, password, idp)
            VALUES (id, '$login', '$password', -1)";
            if (mysqli_query($conn, $sql))
            {
                echo "Congratulations, you now registered!";
            }
            else
            {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
        }
        else {die("Empty fields");}
    }
    if ($_POST['back'] && $_POST['back'] === "Go back")
    {
        header("Location: index.php");
    }
?>    

    </div>
    <div class="down">
            <img class="basket" src="https://www.montagcenter.com.ua/upload/medialibrary/363/3631035d22a99c1bab1fcb66108f8b1f.png" alt="logo" title="Logo" align="left">
            <h1>Хуйня, которую вы купили</h1>
    </div>
</body>
</html>

