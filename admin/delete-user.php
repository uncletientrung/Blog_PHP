<?php
    require 'config/database.php';

    if(isset($_GET['id'])){
        $id= filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

        $query = "SELECT * FROM users WHERE id=$id";
        $result= mysqli_query($conn, $query);
        $user= mysqli_fetch_assoc($result);

        if(mysqli_num_rows($result)==1){
            $avatar_name= $user['avatar'];
            $avatar_path= '../images/'. $avatar_name;
            // Xóa nếu ảnh tồn tại
            if($avatar_path){
                unlink($avatar_path); 
            }
        }
        // Xóa hết các post USER POST

        // Xóa user khỏi database
        $delete_user_query = "DELETE FROM users WHERE id =$id";
        $delete_user_result = mysqli_query($conn, $delete_user_query);
        if(mysqli_errno($conn)){
            $_SESSION['delete-user']="Không thể xóa User: ". $user['first_name'] . ' ' . $user['last_name'];
        }else{
            $_SESSION['delete-user-success']="Xóa thành công User: ". $user['first_name'] . ' ' . $user['last_name']; 
        }
    }
    header('location:' .ROOT_URL. 'admin/manage-users.php');
    die();



?>