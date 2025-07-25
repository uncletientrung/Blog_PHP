<?php
    require 'config/database.php';
    if(isset($_POST['submit'])){
        $username_email= filter_var($_POST['userName_Email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password= filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if(!$username_email){
            $_SESSION['signin']="Yêu cầu nhập User Name or Email";
        }elseif(!$password){
            $_SESSION['signin']="Yêu cầu nhập Password";
        }else{
            $sql= "SELECT * FROM users WHERE user_name='$username_email' OR email='$username_email'";
            $email=$username_email;
            $result=mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)==1){
                $user_row=mysqli_fetch_assoc($result);
                $db_user_pass=$user_row['password']; // Nếu tài khoản code thì trả về hàng đó và lấy mật khẩu hàng đó
                if(password_verify($password, $db_user_pass)){
                    $_SESSION['user-id']=$user_row['id']; // Tạo session lấy id người dùng
                    if($user_row['is_admin']==1){
                        $_SESSION['user_is_admin'] =true;
                    }
                    header('location:'. ROOT_URL.'admin/' );
                }else{
                    $_SESSION['signin']="Vui lòng nhập đúng mật khẩu";
                }
            }else{
                $_SESSION['signin']="Không tìm thấy User";
            }
        }
        if(isset($_SESSION['signin'])){
            $_SESSION['signin-data']=$_POST;
            header("location:".ROOT_URL.'signin.php');
            die();
        }
    }else{
        header('location:' . ROOT_URL . 'signin.php');
        die(); 
    }



?>