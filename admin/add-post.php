<?php
    include 'partials/header.php';
    // Truy vấn select ra các category
    $query="SELECT * FROM categories";
    $categories = mysqli_query($conn, $query);
    //
    $title=$_SESSION['add-post-data']['title'] ?? null;
    $body=$_SESSION['add-post-data']['body'] ?? null;
    unset($_SESSION['add-post-data']);
?>
<section class="form__section">
        <div class="container form__section-container">
            <h2>Add Post</h2>
            <?php if(isset($_SESSION['add-post-success'])) :?>
                <div class="alert__message success">
                    <p>
                        <?= $_SESSION['add-post-success'];
                            unset($_SESSION['add-post-succes']);
                        ?>
                    </p>
                </div> 
            <?php elseif(isset($_SESSION['add-post'])) :?>
                <div class="alert__message error">
                    <p>
                        <?= $_SESSION['add-post'];
                            unset($_SESSION['add-post']);
                        ?>
                    </p>
                </div>
            <?php endif ?>
            <form action="<?= ROOT_URL?>admin/add-post-logic.php" enctype="multipart/form-data" method="POST">
                <input type="text" placeholder="Title" name="title" value="<?= $title ?>">
                <select name="category">
                    <?php while($category_row=mysqli_fetch_assoc($categories)) : ?>
                        <option value="<?= $category_row['id']?>"><?= $category_row['title'] ?></option>  
                    <?php endwhile ?>
                </select>

                <textarea rows="10" placeholder="Body" name="body" ><?= $body ?></textarea>

                <?php if(isset($_SESSION['user_is_admin'])) : ?>
                    <div class="form__control inline">
                        <input type="checkbox" id="is_featured" value="1" name="is_featured">
                        <label for="is_featured" >Featured</label> 
                    </div>
                <?php endif ?>
                <div class="form__control">
                    <label for="thumbnail">Add Thumbnaii</label>
                    <input type="file" id="thumbnaii" name="thumbnail">
                </div>
                <button type="submit" class="btn" name="submit">Add Post</button>
            </form>
        </div>
    </section>
    <!-- XONG FORM ADD CATEGORY -->

<?php
    include '../partials/footer.php';
?>