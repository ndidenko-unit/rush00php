<?php

//  if ($_POST['logout'] && $_POST['logout'] == "Log out")
//     {
//        if (empty($_SESSION)){die("Нou are already logged out");}
//        session_destroy();
//        echo ("done");
//     }
session_start();
if (isset($_SESSION['login']))
    unset($_SESSION['login']);
header('Location: ../rush/index.php');


?>