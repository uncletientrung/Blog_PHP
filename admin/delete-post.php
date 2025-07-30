<?php
    require 'config/database.php';

    if(isset($_GET['id'])){
        $id= filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

        $query = "SELECT * FROM posts WHERE id=$id";
        $result= mysqli_query($conn, $query);
        $post= mysqli_fetch_assoc($result);

        if(mysqli_num_rows($result)==1){
            $thumbnail_name= $post['thumbnail'];
            $thumbnail_path= '../images/'. $thumbnail_name;
            // Xóa nếu ảnh tồn tại
            if($thumbnail_path){
                unlink($thumbnail_path); 
            }
        }

        // Xóa user khỏi database
        $delete_post_query = "DELETE FROM posts WHERE id =$id";
        $delete_post_result = mysqli_query($conn, $delete_post_query);
        if(mysqli_errno($conn)){
            $_SESSION['delete-post']="Không thể xóa Post: ". $post['title'];
        }else{
            $_SESSION['delete-post-success']="Xóa thành công Post: ". $post['title']; 
        }
    }
    header('location:' .ROOT_URL. 'admin/');
    die();



?>