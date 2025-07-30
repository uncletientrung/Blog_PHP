<?php 
    require 'config/database.php';
    if(isset($_POST['submit'])){
        $id=filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
        $name_thumbnail_cu=filter_var($_POST['thumbnail_cu'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $title= filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $body= filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $category_id= filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
        $is_featured= filter_var($_POST['is_featured'], FILTER_SANITIZE_NUMBER_INT);
        $thumbnail= $_FILES['thumbnail'];

        $is_featured = ($is_featured == 1) ? 1 : 0;

        if(!$title){
            $_SESSION["edit-post"]="Vui lòng nhập Title";
        } elseif(!$category_id){
            $_SESSION["edit-post"]="Vui lòng chọn Category";
        }elseif(!$body){
            $_SESSION["edit-post"]="Vui lòng nhập Body";
        }else{
            if($thumbnail['name']){
                $thumbnail_path_cu='../images/'.$name_thumbnail_cu;
                if($thumbnail_path_cu){
                    unlink($thumbnail_path_cu); // Xóa ảnh thumnail cũ khỏi folder
                }
                $time=time();
                $thumbnail_name=$time . $thumbnail['name'];
                $thumbnail_tmp_name= $thumbnail['tmp_name']; // Đường dẫn ảnh
                $thumbnail_destination_path='../images/'. $thumbnail_name; // Tạo đường dẫn ảnh để lưu
                // Các định dạng cho phép sử dụng
                $allowed_files=['png','jpg','jpeg'];
                $extension= explode('.', $thumbnail_name); // Cắt tên str thành array cách nhau bằng . là 1 phần tử
                $extension= end($extension); // lấy phần tử cuối trong mảng
                if(in_array($extension,$allowed_files)){    // nếu nó nằm trong định dạng cho phép
                    if($thumbnail['size'] < 2000000){
                        move_uploaded_file($thumbnail_tmp_name, $thumbnail_destination_path);
                    }else{
                        $_SESSION["edit-post"]="Kích thước ảnh quá lớn < 2mb";
                    }
                }else{
                    $_SESSION["edit-post"]="Định dạng ảnh không hợp lý (PNG, JPG, JPEG)";
                }
            }
        }

        if(isset($_SESSION['edit-post'])){
            $_SESSION['edit-post-data'] = $_POST;
            header('location:' .ROOT_URL . 'admin/');
            die();
        }else{
            if($is_featured==1){ // Set nếu tin mới thêm là tin nổi bật thì set hết tin còn lại là 0
                $zero_all_is_featured_query= "UPDATE posts SET is_featured =0";
                $zero_all_is_featured_result= mysqli_query($conn, $zero_all_is_featured_query);
            }
            // Update post in database
            $thumbnail_to_insert=$thumbnail_name ?? $name_thumbnail_cu; // a = b ?? c. Nếu $b khác null, thì gán $a = $b
                                                                                    // Nếu $b là null, thì gán $a = $c
            $query="UPDATE posts SET title='$title', body='$body', thumbnail='$thumbnail_to_insert', category_id='$category_id',
                                    is_featured=$is_featured WHERE id=$id LIMIT 1 ";
            $result= mysqli_query($conn, $query);
            if(!mysqli_errno($conn)){
                $_SESSION['add-post-success'] = "Sửa Post Thành Công";
                header('location:'. ROOT_URL.'admin/');
                die();
            }
        }
    }
    header('location:'. ROOT_URL.'admin/');
    die();


?>