<?php

    session_start();




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
    <?php   
     $name = $_GET['name'];
    $cat = $_GET['cat'];
    $price = $_GET['price'];
    $img = $_GET['img'];
    
    if ($_GET['no'] && $_GET['no'] === 'Вернуться')
    {
        header("Location: admin.php");
    }
    if ($_GET['ok'] && $_GET['ok'] === 'Подтвердить')
    {
        if ($name  && $price && $img && $cat)
        {
            if ($price < 0){"Не очень цена=(";}
            else
            {
                $conn = mysqli_connect('localhost', 'root', '5956861', "shop");
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                if ($cat == 'Гранаты' || $cat == 'Пистолеты' || $cat == 'Дробовики' || $cat == 'Винтовки') {
                    $sql = "INSERT INTO tovars (id, product, category, price, photo)
            VALUES (id, '$name', '$cat', '$price', '$img')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Товар добавлено!";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    mysqli_close($conn);
                }
                else{echo "Выберите категорию из существующих";}
            }

        }
        else {echo("Заполните обязательные поля!");}
    }  ?>
        <form action="add.php" method="get">
        
                <p>Название товара:</p>
                <input type="text" name="name">
                <p>Доступные категории товара:</p>
                    <button>Гранаты</button>
                     <button>Пистолеты</button>
                    <br/>
                    <button>Дробовики</button>
                    <button>Cнайперские винтовки</button>
                <p>Категория</p>
                <input type="text" name="cat">
                <p>Цена товара:</p>
                <input type="text" name="price">
                <p>Фото:</p>
                <input type="text" name="img">
                <br />
                <input type="submit" name="ok" value="Подтвердить">
                <input type="submit" name="no" value="Вернуться">
        
            </form>

    <?php } ?>

        </div>

        </form>


        </fieldset>
    
   

    </div>

</body>



</html>
