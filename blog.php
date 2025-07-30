<?php
    include 'partials/header.php';

    // In  bài post
    $query="SELECT * FROM posts ";
    $posts=mysqli_query($conn, $query);

    // Các tittle phía dưới 
    $category_query="SELECT * FROM categories";
    $categories=mysqli_query($conn, $category_query);

?>
     
    <section class="search__bar">
        <form action="" class="container search__bar-container">
            <div>
                <i class="fas fa-search"></i>
                <input type="search" name="" placeholder="Search">
            </div>
            <button type="submit" class="btn">Go</button>
        </form>
    </section>
      <!-- XONG PHẦN Tìm kiếm -->

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