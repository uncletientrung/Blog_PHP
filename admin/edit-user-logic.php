<?php
    require 'config/database.php';
    if(isset($_POST['submit'])){
        // Xử lý sự kiện sửa user
        $id= filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
        $first_name= filter_var($_POST['first_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $last_name= filter_var($_POST['last_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $is_admin= filter_var($_POST['user_role'], FILTER_SANITIZE_NUMBER_INT);

        // Kiểm tra dữ liệu sửa
        if(!$first_name || !$last_name){
            $_SESSION['edit-user']= "Cần nhập đủ dữ liệu vào trong ô";
        }else{
            $query = "UPDATE users SET first_name='$first_name', last_name='$last_name', is_admin=$is_admin 
                                WHERE id=$id LIMIT 1";
            $result= mysqli_query($conn, $query);
            if(mysqli_errno($conn)){
                $_SESSION['edit-user']= "Sửa User thất bại";
            }else{
                 $_SESSION['edit-user-success']= "Sửa User: $last_name $first_name thành công";
            }
        }
    }
    header('location:' . ROOT_URL. 'admin/manage-users.php');
    die();



?>