<?php
    require 'config/database.php';

    if(isset($_GET['id'])){
        $id=filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

        $query="DELETE FROM categories WHERE id=$id LIMIT 1";
        $result=mysqli_query($conn, $query);
        $_SESSION['delete-category-success']="Xóa Category THÀNH CÔNG ";
    }
    header('location: '.ROOT_URL. "admin/manage-categories.php");
    die();


?>