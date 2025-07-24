<?php
    require 'config/constants.php';

    // Connect
    $conn=new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if(mysqli_errno($conn)){
        die("Kết nối thất bại: " . mysqli_connect_error());
    }

?>