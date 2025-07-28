<?php
    require 'config/database.php';
    if(isset($_POST['submit'])){
        $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if(!$title){
            $_SESSION['add-category']="Vui lòng nhập Title";
        }elseif(!$description){
            $_SESSION['add-category']="Vui lòng nhập Description";
        }
        if(isset($_SESSION['add-category'])){
            $_SESSION['add-category-data']=$_POST;
            header('location:'. ROOT_URL. 'admin/add-category.php');
            die();
        }else{
            $query="INSERT INTO categories (title, description) VALUE ('$title', '$description')";
            $result= mysqli_query($conn, $query);
            if(mysqli_errno($conn)){
                $_SESSION['add-category']="Thêm Category: ". $title . " Thất Bại"; 
                header('location:'. ROOT_URL. 'admin/add-category.php');
                die();
            }else{
                $_SESSION['add-category-success']="Thêm Category:  ". $title . " Thành Công"; 
                header('location:'. ROOT_URL. 'admin/manage-categories.php');
            }
        }
    }



?>