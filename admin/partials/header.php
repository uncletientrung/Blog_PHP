<?php
    require 'config/database.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reponsive Multipage Blog Website</title>
    <link rel="stylesheet" href="<?= ROOT_URL ?>/css/style.css">      <!-- TRANG TRÍ HTML -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> <!-- ICONSCOUT -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
 
</head>
<body>  
    <!-- Thẻ điều hướng MENU BAR -->
    <nav>   
        <div class="container nav__container">
            <a href="<?= ROOT_URL ?>" class="nav__logo">TBLOG</a>
            <ul class="nav__items">
                <li><a href="<?= ROOT_URL ?>blog.php">Blog</a></li>
                <li><a href="<?= ROOT_URL ?>about.php">About</a></li>
                <li><a href="<?= ROOT_URL ?>services.php">Servies</a></li>
                <li><a href="<?= ROOT_URL ?>contact.php">Contact</a></li>
                <!-- <li><a href="signin.html">Signin</a></li> -->
                <li class="nav__profile">
                    <div class="avatar">
                        <img src="../images/blog4.jpg">
                    </div>
                    <ul>
                        <li><a href="<?= ROOT_URL ?>admin/index.php">Dashboard</a></li>
                        <li><a href="<?= ROOT_URL ?>logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
            <button id="open__nav-btn"><i class="fas fa-bars"></i></button>
            <button id="close__nav-btn"><i class="fas fa-times"></i></button>
        </div>
    </nav>
    <!-- XONG PHẦN MENU BAR -->