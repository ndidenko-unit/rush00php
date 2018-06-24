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


?>

<html>

<form action="admin.php" method="GET">


    <input type="submit" name="main" value="На главную">
    <input type="submit" name="add" value="Добавить товар">
    <input type="submit" name="edit" value="Редактировать товар">
    <input type="submit" name="delete" value="Удалить товар">

</form>


</html>
