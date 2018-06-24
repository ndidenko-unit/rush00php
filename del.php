

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
    Режим администрирования
</div>
<div class="centerside"><br><br>
    <?php

    $id = key($_GET);
    $conn = mysqli_connect('localhost', 'root', '5956861', "shop");
    $sql = "DELETE FROM tovars WHERE id = '$id'";
    $res = mysqli_query($conn, $sql);
    if ($res){echo "Успешно удалено";}
    if ($_POST['back'] && $_POST['back'] == "Вернуться назад"){header("Location: edit.php");}

    ?>
    <form action="del.php" method="post">
        <input type="submit" name="back" value="Вернуться назад">


</div>

</form>


</fieldset>



</div>

</body>


    <form action="del.php" method="post">
        <input type="submit" name="back" value="Вернуться назад">
        <br/>
    </form>
</html>
