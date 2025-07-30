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
        $thumbnails_query="SELECT thumbnail FROM posts WHERE author_id=$id";
        $thumbnails_result=mysqli_query($conn, $thumbnails_query);
        if(mysqli_num_rows($thumbnails_result)>0){  // Sau khi xóa user thì database set Null khi xóa id thì nó sẽ xóa hết
                                                    // Sau đó nó sẽ xóa thumbnail như dưới 
            while($thumbnail_row= mysqli_fetch_assoc($thumbnails_result)){
                // Xóa hết thumbnail ra trước
                $thumbnail_path='../image/'. $thumbnail_row['thumbnail'];
                if($thumbnail_path){
                    unlink( $thumbnail_path);
                }
            }
        }


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