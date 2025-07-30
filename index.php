<?php
    include 'partials/header.php';

    // Post nổi bật
    $featured_query="SELECT * FROM posts WHERE is_featured=1";
    $featured_result= mysqli_query($conn, $featured_query);
    $featured=mysqli_fetch_assoc($featured_result);

    // In tối đa 9 bài post
    $query="SELECT * FROM posts LIMIT 9";
    $posts=mysqli_query($conn, $query);

    // Các tittle phía dưới 
    $category_query="SELECT * FROM categories";
    $categories=mysqli_query($conn, $category_query);

?>
 
    <?php if(mysqli_num_rows($featured_result)==1) : ?>
        <section class="featured">
            <div class="container featured__container">
                <div class="post__thumbnail">
                    <img src="./images/<?= $featured['thumbnail'] ?>" alt="">
                </div>
                <div class="post__info">
                    <?php
                        $category_id=$featured['category_id'];
                        $category_query="SELECT * FROM categories WHERE id =$category_id";
                        $category_result=mysqli_query($conn, $category_query);
                        $category=mysqli_fetch_assoc($category_result);

                        $user_id=$featured['author_id'];
                        $user_query="SELECT * FROM users WHERE id =$user_id";
                        $user_result=mysqli_query($conn, $user_query);
                        $user=mysqli_fetch_assoc($user_result);
                    ?>
                    <a href="<?= ROOT_URL?>category-posts.php?id=<?= $featured['category_id']?>" class="category__button">
                        <?= $category['title'] ?>
                    </a>
                    <h2 class="post__title"> 
                        <a href="<?= ROOT_URL?>post.php?id=<?=$featured['id']?>"> 
                            <?= $featured['title']?>
                        </a> 
                    </h2>
                    <p class="post__body">
                        <?= substr($featured['body'],0, 300)?>
                    </p>
                    <div class="post__author">
                        <div class="post__author-avatar">
                            <img src="./images/<?= $user['avatar'] ?>" alt="">
                        </div>
                        <div class="post__author-info">
                            <h5>By: <?= $user['first_name'] .' '. $user['last_name']?></h5>
                            <small>
                                <?= date("M d, Y - H:i ", strtotime($featured['date_time'])) ?>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </section>
     <?php endif ?>
      <!-- XONG PHẦN Tin nổi bật -->

     <section class="posts <?= $featured ? '': 'section__extra-margin' ?>">
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