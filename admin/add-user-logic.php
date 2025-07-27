<?php
    require 'config/database.php';
    if(isset($_POST['submit'])){
        $fname=filter_var($_POST['first_name'], FILTER_SANITIZE_SPECIAL_CHARS);
        $lname=filter_var($_POST['last_name'], FILTER_SANITIZE_SPECIAL_CHARS);
        $uname=filter_var($_POST['user_name'], FILTER_SANITIZE_SPECIAL_CHARS);
        $email=filter_var($_POST['email'], FILTER_SANITIZE_SPECIAL_CHARS);
        $pass1=filter_var($_POST['pass1'], FILTER_SANITIZE_SPECIAL_CHARS);
        $pass2=filter_var($_POST['pass2'], FILTER_SANITIZE_SPECIAL_CHARS);
        $avatar=$_FILES['avatar'];
        $is_admin=filter_var($_POST['user_role'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        // echo $fname, $lname, $uname, $email, $pass1, $pass2;
        // var_dump($avatar);
        echo "<script>alert('Mật khẩu là: $pass1 và độ dài là " . strlen($pass1) . "');</script>";
        
        if(!$fname){
            $_SESSION['add-user']= "Vui lòng nhập First Name";
        }elseif (!$lname){
            $_SESSION['add-user']= "Vui lòng nhập Last Name";
        }elseif (!$uname){
            $_SESSION['add-user']= "Vui lòng nhập User Name";
        }elseif (!$pass1 || !$pass2){
            $_SESSION['add-user'] = "Vui lòng nhập mật khẩu";
        }elseif (strlen($pass1) < 2 || strlen($pass2) < 2){
            $_SESSION['add-user']= "Mật khẩu nhiều hơn 2 ký tự";
        }elseif (!$email){
            $_SESSION['add-user']= "Vui lòng nhập Email";
        }elseif ($is_admin>2){
            $_SESSION['add-user']= "Vui lòng chọn vai trò người dùng";
        }elseif (!$avatar['name']){
            $_SESSION['add-user']= "Vui lòng thêm avatar";
        }else{
            if($pass1 !== $pass2){
                $_SESSION['add-user']=" 2 Password không giống nhau";
            }else{
                // Thuật toán hash
                $hash_pass=password_hash($pass1, PASSWORD_DEFAULT);

                // Kiểm tra tồn tại username and email
                $sql ="SELECT * FROM users WHERE user_name = ? or email= ? ";
                $stmt=$conn->prepare($sql);
                $stmt->bind_param("ss",$uname,$email);
                $stmt->execute();
                $result=$stmt->get_result();
                if($result->num_rows >0){
                    $_SESSION['add-user']="UserName or Email đã tồn tại";
                }else{
                    // Làm việc với avatar
                    $time=time();
                    $avatar_name=$time.$avatar['name']; // Tên avatar  = thời gian + tên avatar
                    $avatar_tmp_name= $avatar['tmp_name'];
                    $avatar_path= '../images/'. $avatar_name;
                        // Các định dạng cho phép 
                    $allowed_files=['png','jpg','jpeg'];
                    $extention= explode('.',$avatar_name); // Tách chuỗi vd avatar.png tách thành ['avatar','png']
                    $extention= end($extention);            // Lấy phần tử cuối của mảng
                    if(in_array($extention, $allowed_files)){  // Kiểm tra có hợp lý không
                        if($avatar['size'] <1000000){
                            // Upload nếu không quá 1MB và di chuyển về thư mực
                            move_uploaded_file($avatar_tmp_name, $avatar_path);
                        }else{
                            $_SESSION['add-user']="File quá lớn. Ảnh nên thấp hơn 1 MB ";
                        }
                    }else{
                        $_SESSION['add-user']="File không đúng định dạng png hoặc jpg hoặc jpeg";
                    }
                }
            }
        }
        // Nếu gặp vấn đề gì quay về Signup.php
        if(isset($_SESSION['add-user'])){
            $_SESSION['add-user-data']=$_POST;
            unset($_POST);
            header('location:' . ROOT_URL.'admin/add-user.php');
            die();
        }else{
            $insert_user_query="INSERT INTO users(first_name, last_name, user_name, email, password, avatar, is_admin)
                                        VALUES ('$fname', '$lname', '$uname', '$email', '$hash_pass', '$avatar_name', 
                                                '$is_admin')";
            mysqli_query($conn, $insert_user_query);
            if(!mysqli_errno($conn)){
                $_SESSION['add-user-success']="Thêm User thành công!!!";
                header('location:' .ROOT_URL . 'admin/add-user.php');
                die();
            }
        }

    }else{
        header('location:' .ROOT_URL . 'admin/add-user.php');
        die();
    }
