

<?php

    $conn = mysqli_connect('localhost', 'root', '5956861', "shop");
    session_start();
    if (!$_SESSION['id_edit']){$_SESSION['id_edit'] = $_GET['value'];}
    $id = $_SESSION['id_edit'];
    $name = $_POST['name'];
    $cat = $_POST['cat'];
    $price = $_POST['price'];
    $photo = $_POST['photo'];
    if ($_POST['submit'] && $_POST['submit'] == "Назад"){header("Location: edit.php");}
    if ($_POST['submit'] && $_POST['submit'] == "Подтвердить")
    {
        if (!$name && !$cat && !$price && !$photo){header("Location: editing.php?$id");}
        else
        {
            if ($name)
            {
                $sql2 = "UPDATE tovars SET product='$name' WHERE id='$id'";
                $res = mysqli_query($conn, $sql2);
            }
            if ($cat && ($cat == 'Гранаты' || $cat == 'Пистолеты' || $cat == 'Дробовики' || $cat == 'Винтовки'))
            {
                $sql2 = "UPDATE tovars SET category='$cat' WHERE id='$id'";
                $res = mysqli_query($conn, $sql2);
            }
            if ($price && $price > 0)
            {
                $sql2 = "UPDATE tovars SET price='$price' WHERE id='$id'";
                $res = mysqli_query($conn, $sql2);
            }
            if ($photo)
            {
                $sql2 = "UPDATE tovars SET photo='$photo' WHERE id='$id'";
                $res = mysqli_query($conn, $sql2);
            }
            header("Location: editing.php?$id");
        }


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

    </fieldset>
</div>
<div class="centerside"><br><br>
    <form action="editing.php" method="post">
        <p>Новое название:</p>
        <input type="text" name="name">
        <p>Новая категория:</p>
        <input type="text" name="cat">
        <p>Новая цена:</p>
        <input type="text" name="price">
        <p>Новое фото:</p>
        <input type="text" name="photo">
        <br/>
        <input type="submit" name="submit" value="Назад">
        <input type="submit" name="submit" value="Подтвердить">
    </form>
    <?php

    $conn = mysqli_connect('localhost', 'root', '5956861', "shop");
    $sql = "SELECT * FROM tovars WHERE id = '$id'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    echo "<fieldset class=\"tovar\"><legend>$row[product]</legend><img width='200px' height='180px'
        src=$row[photo]><br><br>Категория: $row[category]<br><br>Цена: $row[price]$<br><br>
        </fieldset>";
    ?>
</div>
</body>
</html>
