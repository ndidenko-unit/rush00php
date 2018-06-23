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
    price VARCHAR(30) NOT NULL,
    photo VARCHAR(100) NOT NULL 
    )";
    mysqli_query($conn, $sql);
    $sql = "CREATE TABLE busket (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product VARCHAR(50) NOT NULL,
    category VARCHAR(30) NOT NULL,
    price VARCHAR(30) NOT NULL,
    photo VARCHAR(1000) NOT NULL 
    )";
    mysqli_query($conn, $sql);


?>