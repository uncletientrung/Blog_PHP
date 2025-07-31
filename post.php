<?php
    include 'partials/header.php';

    //
    if(isset($_GET['id'])){
        $id=filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
        $query="SELECT * FROM posts WHERE id=$id";
        $result=mysqli_query($conn, $query);
        $post=mysqli_fetch_assoc($result);
    }else{
        header('location:'. ROOT_URL. 'blog.php');
    }
?>

    <section class="singlepost">
        <div class="container singlepost__container">
            <?php 
                $user_id=$post['author_id'];
                $user_query="SELECT * FROM users WHERE id =$user_id";
                $user_result=mysqli_query($conn, $user_query);
                $user=mysqli_fetch_assoc($user_result);
            ?>
            <h2><?= $post['title'] ?></h2>
            <div class="post__author">
                <div class="post__author-avatar">
                     <img src="./images/<?= $user['avatar'] ?>" alt="">
                </div>
                <div class="post__author-info">
                    <h5>By: <?= $user['first_name'] .' '. $user['last_name']?></h5>
                    <small>
                        <?= date("M d, Y - H:i ", strtotime($post['date_time'])) ?>
                    </small>
                </div>
            </div>
            <div class="singlepost__thumbnail">
                <img src="./images/<?= $post['thumbnail'] ?>" >
            </div>
            <p> 
                <?= $post['body']?>
            </p>
        </div>
    </section>
    <!-- XONG PHẦN SINGLE POST -->

<?php
    include 'partials/footer.php';
?>