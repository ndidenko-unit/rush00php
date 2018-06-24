<?php

    session_start();
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
            $conn = mysqli_connect('localhost', 'root', '12345678', "shop");
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            if ($cat == 'Гранаты' || $cat == 'Пистолеты' || $cat == 'Дробовики' || $cat == 'Cнайперские винтовки') {
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
        else {echo("Заполните обязательные поля!");}
    }



?>


<html>

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


</html>
