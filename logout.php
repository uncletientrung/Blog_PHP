<?php
    require 'config/constants.php';
    session_destroy(); // Hàm hủy toàn bộ session
    header('location:' .ROOT_URL);
    die();
?>