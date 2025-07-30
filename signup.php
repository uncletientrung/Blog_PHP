<?php
    require 'config/database.php';

    // Ghi nhớ lại thông tin nếu người dùng lỡ nhập sai
    $first_name=$_SESSION['signup-data']['first_name'] ?? null; 
    $last_name=$_SESSION['signup-data']['last_name'] ?? null;
    $user_name=$_SESSION['signup-data']['user_name'] ?? null;
    $email=$_SESSION['signup-data']['email'] ?? null;
    $password=$_SESSION['signup-data']['password'] ?? null;
    $confirm_password=$_SESSION['signup-data']['confirm_password'] ?? null;
    unset($_SESSION['signup-data']); // Xóa để cập nhật cái mới

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reponsive Multipage Blog Website</title>
    <link rel="stylesheet" href="css/style.css">      <!-- TRANG TRÍ HTML -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> <!-- ICONSCOUT -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
 
</head>

<body> 
    <section class="form__section">
        <div class="container form__section-container">
            <h2>Sign Up</h2>
            
            <?php if(isset($_SESSION['signup'])) : ?>
                <div class="alert__message error">
                    <p><?= $_SESSION['signup'];
                        unset($_SESSION['signup']);  // Xóa lun sau khi hiện lỗi 
                        ?>
                    </p>
                </div>
            <?php endif ?>
                
            
            <form action="<?php ROOT_URL?>signup-logic.php" enctype="multipart/form-data" method="POST">
                <input type="text" name="first_name" value="<?= $first_name?>" placeholder="First Name">
                <input type="text" name="last_name" value="<?= $last_name?>" placeholder="Last Name">
                <input type="text" name="user_name" value="<?= $user_name?>" placeholder="Username">
                <input type="email" name="email" value="<?= $email?>" placeholder="Email">
                <input type="password" name="password" value="<?= $password?>" placeholder="Create Password">
                <input type="password" name="confirm_password" value="<?= $confirm_password?>" placeholder="Confirm Password">
                <div class="form__control">
                    <label for="avatar">User Avatar</label>
                    <input type="file" name="avatar" id="avatar">
                </div>
                <button type="submit" name ="submit" class="btn">Sign Up</button>
                <small>Already have a account? <a href="signin.php">Sign In</a></small>
            </form>
        </div>
    </section>
</body>
</html>



<?php
    include 'partials/header.php';

    // Post nổi bật
    $featured_query="SELECT * FROM posts WHERE is_featured=1";
    $featured_result= mysqli_query($conn, $featured_query);
    $featured=mysqli_fetch_assoc($featured_result);

    // In tối đa 9 bài post
    $query="SELECT * FROM posts ORDER BY data_time DESC LIMIT 9";
    $posts=mysqli_query($conn, $query);

?>
 


     <section class="posts">
        <div class="container posts__container">
            <?php while($post_row=mysqli_fetch_assoc($posts)) : ?>
                <article class="post">
                    <?php
                        $category_id=$post_row['category_id'];
                        $category_query="SELECT * FROM categories WHERE id =$category_id";
                        $category_result=mysqli_query($conn, $category_query);
                        $category=mysqli_fetch_assoc($category_result);
                    ?>
                    <div class="post__thumbnail">
                        <img src="./images/<?= $posts_row['thumbnail'] ?>">
                    </div>
                    <div class="post__info">
                        <a href="<?= ROOT_URL?>category-posts.php?id=<?=$post_row['category_id']?>" class="category__button">
                            <?= $category['title'] ?>
                        </a>

                        <h3 class="post__title">
                            <a href="<?= ROOT_URL. 'post.php?id='. $featured['id'] ?>"> 
                            <?= $featured['title']?>
                        </a> 
                        </h3>

                        <p class="post__body">
                            Là 1 cái gì đó thú vị và hay ho
                        </p>
                        <div class="post__author">
                            <div class="post__author-avatar">
                                <img src="./images/blog4.jpg">
                            </div>
                            <div class="post__author-info">
                                <h5>By: TrungGD1</h5>
                                <small>
                                    <?= date("M d, Y - H:i ", strtotime($featured['date_time'])) ?>
                                </small>
                            </div>
                        </div>
                    </div>
                </article>
            <?php endwhile ?>
        </div>
     </section>
     <!-- XONG PHẦN POST -->

     <section class="category__buttons">
        <div class="container category__buttons-container">
            <a href="" class="category__button">RED</a>
            <a href="" class="category__button">GREEN</a>
            <a href="" class="category__button">YELLOW</a>
            <a href="" class="category__button">BLUE</a>
            <a href="" class="category__button">PURPLE</a>
            <a href="" class="category__button">ORANGE</a>
        </div>
     </section>
     <!-- XONG PHẦN CATEPGORY BUTTONS (Chọn loại) -->

<?php
    include 'partials/footer.php';

?>