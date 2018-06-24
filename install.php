<?php

    $servername = "localhost";
    $username = "root";
    $password = "5956861";
    $name_db = "shop";

    $conn = mysqli_connect('localhost', 'root', '5956861');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "CREATE DATABASE $name_db";
    mysqli_query($conn, $sql);
    $conn = mysqli_connect('localhost', 'root', '5956861', "shop");
    $sql = "CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    login VARCHAR(30) NOT NULL,
    password VARCHAR(1000) NOT NULL,
    idp INT(6)
    )";
    mysqli_query($conn, $sql);
    $sql = "CREATE TABLE tovars (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    product VARCHAR(50) NOT NULL,
    category VARCHAR(30) NOT NULL,
    price INT(30) NOT NULL,
    photo VARCHAR(5000) NOT NULL 
    )";
    mysqli_query($conn, $sql);
    $sql = "CREATE TABLE busket (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product VARCHAR(50) NOT NULL,
    category VARCHAR(30) NOT NULL,
    price INT(30) NOT NULL,
    photo VARCHAR(5000) NOT NULL 
    )";
    mysqli_query($conn, $sql);
    $pass = hash('whirlpool', 'admin');
    $sql2 = "SELECT * FROM users WHERE login='admin'";
    $res = mysqli_query($conn, $sql2);
    $row = mysqli_fetch_assoc($res);
    if (!isset($row))
    {
        $sql = "INSERT INTO users (id, login, password, idp)
            VALUES (id, 'admin', '$pass', -1)";
        mysqli_query($conn, $sql);
    }
    $sql2 = "SELECT * FROM tovars";
    $res = mysqli_query($conn, $sql2);
    $row = mysqli_fetch_assoc($res);
    if (!isset($row))
    {
        $sql = $sql = "INSERT INTO tovars (id, product, category, price, photo)
            VALUES (id, 'Awp', 'Винтовки', '2000', './img/sniper/cz700_b.jpg')";
        mysqli_query($conn, $sql);
        $sql = $sql = "INSERT INTO tovars (id, product, category, price, photo)
            VALUES (id, 'Dragunov', 'Винтовки', '4000', './img/sniper/falcon_b.jpg')";
        mysqli_query($conn, $sql);
        $sql = $sql = "INSERT INTO tovars (id, product, category, price, photo)
            VALUES (id, 'F1', 'Гранаты', '300', './img/gren/grenade_f1_b.jpg')";
        mysqli_query($conn, $sql);
        $sql = $sql = "INSERT INTO tovars (id, product, category, price, photo)
            VALUES (id, 'Deagle', 'Пистолеты', '1000', './img/pist/eagle_b.jpg')";
        mysqli_query($conn, $sql);
        $sql = $sql = "INSERT INTO tovars (id, product, category, price, photo)
            VALUES (id, 'Awp', 'Дробовики', '1599', './img/drob/hunter_b.jpg')";
        mysqli_query($conn, $sql);
    }

?>