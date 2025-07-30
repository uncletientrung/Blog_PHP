<?php
    include 'partials/header.php';
    // Truy vấn select ra các category
    $query="SELECT * FROM categories";
    $categories = mysqli_query($conn, $query);
    //
    if(isset($_GET['id'])){
        $id=filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
        $query_post="SELECT * FROM posts WHERE id = $id";
        $result_post=mysqli_query($conn, $query_post);
        if(mysqli_num_rows($result_post)==1){
            $update_post=mysqli_fetch_assoc($result_post);
        }
    }else{
        header('location: '.ROOT_URL.'admin');
        die();
    }

?>

    <section class="form__section">
        <div class="container form__section-container">
            <h2>Edit Post</h2>
            <form action="<?= ROOT_URL?>admin/edit-post-logic.php" enctype="multipart/form-data" method="POST">
                <input type="hidden" name="id" value="<?= $update_post['id'] ?>">
                <input type="hidden" name="thumbnail_cu" value="<?= $update_post['thumbnail'] ?>">
                <input type="text" placeholder="Title" name="title" value="<?= $update_post['title'] ?>">
                <select name="category">
                    <?php while($category_row=mysqli_fetch_assoc($categories)) : ?>
                        <option value="<?= $category_row['id']?>" 
                                <?= $update_post['category_id']== $category_row['id'] ? 'selected' : ''?>>
                                    <?= $category_row['title'] ?>
                        </option>  
                    <?php endwhile ?>
                </select>

                <textarea rows="10" placeholder="Body" name="body" ><?= $update_post['body'] ?></textarea>

                <?php if(isset($_SESSION['user_is_admin'])) : ?>
                    <div class="form__control inline">
                        <input type="checkbox" id="is_featured" value="1" name="is_featured"  <?= $update_post['is_featured']== 1 ? 'checked' : ''?>>
                        <label for="is_featured" >Featured</label> 
                    </div>
                <?php endif ?>
                <div class="form__control">
                    <label for="thumbnail">Change Thumbnaii</label>
                    <input type="file" id="thumbnaii" name="thumbnail">
                </div>
                <button type="submit" class="btn" name="submit">Update Post</button>
            </form>
        </div>
    </section>
    <!-- XONG FORM ADD CATEGORY -->

<?php
    include '../partials/footer.php';
?>