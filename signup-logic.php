<?php
    session_start();
    require 'config/database.php';
    if(isset($_POST['submit'])){
        $fname=filter_var($_POST['first_name'], FILTER_SANITIZE_SPECIAL_CHARS);
        $lname=filter_var($_POST['last_name'], FILTER_SANITIZE_SPECIAL_CHARS);
        $uname=filter_var($_POST['user_name'], FILTER_SANITIZE_SPECIAL_CHARS);
        $email=filter_var($_POST['email'], FILTER_SANITIZE_SPECIAL_CHARS);
        $pass1=filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS);
        $pass2=filter_var($_POST['confirm_password'], FILTER_SANITIZE_SPECIAL_CHARS);
        $avatar=$_FILES['avatar'];
        // echo $fname, $lname, $uname, $email, $pass1, $pass2;
        // var_dump($avatar);
        
        if(!$fname){
            $_SESSION['signup']= "Vui lòng nhập First Name";
        }elseif (!$lname){
            $_SESSION['signup']= "Vui lòng nhập Last Name";
        }elseif (!$uname){
            $_SESSION['signup']= "Vui lòng nhập User Name";
        }elseif (strlen($pass1)<0 || strlen($pass2) <0){
            $_SESSION['signup']= "Mật khẩu nhiều hơn 0 ký tự";
        }elseif (!$email){
            $_SESSION['signup']= "Vui lòng nhập Email";
        }elseif (!$avatar['name']){
            $_SESSION['signup']= "Vui lòng thêm avatar";
        }else{
            if($pass1 !== $pass2){
                $_SESSION['signup']=" 2 Password không giống nhau";
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
                    $_SESSION['signup']="UserName or Email đã tồn tại";
                }else{
                    // Làm việc với avatar
                    $time=time();
                    $avatar_name=$time.$avatar['name']; // Tên avatar  = thời gian + tên avatar
                    $avatar_tmp_name= $avatar['tmp_name'];
                    $avatar_path= 'images/'. $avatar_name;
                        // Các định dạng cho phép 
                    $allowed_files=['png','jpg','jpeg'];
                    $extention= explode('.',$avatar_name); // Tách chuỗi vd avatar.png tách thành ['avatar','png']
                    $extention= end($extention);            // Lấy phần tử cuối của mảng
                    if(in_array($extention, $allowed_files)){  // Kiểm tra có hợp lý không
                        if($avatar['size'] <1000000){
                            // Upload nếu không quá 1MB và di chuyển về thư mực
                            move_uploaded_file($avatar_tmp_name, $avatar_path);
                        }else{
                            $_SESSION['signup']="File quá lớn. Ảnh nên thấp hơn 1 MB ";
                        }
                    }else{
                        $_SESSION['signup']="File không đúng định dạng png hoặc jpg hoặc jpeg";
                    }
                }
                
            }
        }
        // Nếu gặp vấn đề gì quay về Signup.php
        if(isset($_SESSION['signup'])){
            $_SESSION['signup-data']=$_POST;
            header('location:' . ROOT_URL.'signup.php');
            die();
        }else{
            $insert_user_query="INSERT INTO users(first_name, last_name, user_name, email, password, avatar, is_admin)
                                        VALUES ('$fname', '$lname', '$uname', '$email', '$hash_pass', '$avatar_name', 
                                                '0')";
            mysqli_query($conn, $insert_user_query);
            if(!mysqli_errno($conn)){
                $_SESSION['signup-success']="Đăng ký thành công vui lòng đăng nhập!!!";
                header('location:' .ROOT_URL . 'signin.php');
                die();
            }
        }

    }else{
        header('location:' .ROOT_URL . 'signup.php');
        die();
    }
