<?php
    include 'partials/header.php';

    //
    if(isset($_GET['id'])){
        $id=filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
        $query="SELECT * FROM posts WHERE category_id=$id ORDER BY date_time DESC";
        $posts=mysqli_query($conn, $query);
    }else{
        header('location:'. ROOT_URL. 'blog.php');
    }

    // Các tittle phía dưới 
    $category_query="SELECT * FROM categories";
    $categories=mysqli_query($conn, $category_query); // Làm ẩu nên nó trùng tên
?>

    <header class="category__title">
        <?php
            $category_id=$id;
            $category_query="SELECT * FROM categories WHERE id =$category_id";
            $category_result=mysqli_query($conn, $category_query);
            $category=mysqli_fetch_assoc($category_result);
        ?>
        <h2><?= $category['title']?></h2>
    </header>
    <!-- XONG PHẦN Category Title -->
    <?php if(mysqli_num_rows($posts) >0) :?>
     <section class="posts">
        <div class="container posts__container">
            <?php while($post_row=mysqli_fetch_assoc($posts)) : ?>
                <article class="post">
                    <?php
                        $category_id=$post_row['category_id'];
                        $category_query="SELECT * FROM categories WHERE id =$category_id";
                        $category_result=mysqli_query($conn, $category_query);
                        $category=mysqli_fetch_assoc($category_result);

                        $user_id=$post_row['author_id'];
                        $user_query="SELECT * FROM users WHERE id =$user_id";
                        $user_result=mysqli_query($conn, $user_query);
                        $user=mysqli_fetch_assoc($user_result);
                    ?>
                    <div class="post__thumbnail">
                        <img src="./images/<?= $post_row['thumbnail'] ?>">
                    </div>
                    <div class="post__info">
                        <a href="<?= ROOT_URL?>category-posts.php?id=<?=$post_row['category_id']?>" class="category__button">
                            <?= $category['title'] ?>
                        </a>

                        <h3 class="post__title">
                            <a href="<?= ROOT_URL. 'post.php?id='. $post_row['id'] ?>"> 
                            <?= $post_row['title']?>
                        </a> 
                        </h3>

                        <p class="post__body">
                            <?= substr($post_row['body'],0, 300)?>
                        </p>
                        <div class="post__author">
                            <div class="post__author-avatar">
                                <img src="./images/<?= $user['avatar'] ?>">
                            </div>
                            <div class="post__author-info">
                                <h5>By: <?= $user['first_name'] .' '. $user['last_name']?></h5>
                                <small>
                                    <?= date("M d, Y - H:i ", strtotime($post_row['date_time'])) ?>
                                </small>
                            </div>
                        </div>
                    </div>
                </article>
            <?php endwhile ?>
        </div>
     </section>
     <?php else : ?>
        <div class="alert__message error lg">
            <p>Không có bài post nào</p>
        </div>
    <?php endif ?>
     <!-- XONG PHẦN POST -->

     <section class="category__buttons">
        <div class="container category__buttons-container">
            <?php while($category_row=mysqli_fetch_assoc($categories)) : ?>
                <a href="<?= ROOT_URL ?>category-posts.php?id=<?= $category_row['id'] ?>" class="category__button">
                    <?= $category_row['title'] ?>
                </a>
            <?php endwhile ?>
        </div>
     </section>
     <!-- XONG PHẦN CATEPGORY BUTTONS (Chọn loại) -->

 <?php
    include 'partials/footer.php';
?>