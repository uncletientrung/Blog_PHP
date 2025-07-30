<?php
    include 'partials/header.php';

    $current_user_id=$_SESSION['user-id'];
    $query="SELECT posts.id, posts.title, posts.category_id
            FROM posts, users
            WHERE posts.author_id = users.id AND posts.author_id= $current_user_id" ;
    $posts= mysqli_query($conn, $query);
?>

    <section class="dashboard">
         <!-- Hiển thị thêm POST THÀNH CÔNG -->
        <?php if(isset($_SESSION['add-post-success'])) : ?> 
            <div class="alert__message success container">
                <p>
                    <?= $_SESSION['add-post-success'];
                        unset($_SESSION['add-post-success']);
                    ?>
                </p>
            </div> 
        <!-- Hiển thị SỬA POST THÀNH CÔNG -->
        <?php elseif(isset($_SESSION['edit-post-success'])) : ?>
            <div class="alert__message success container">
                <p>
                    <?= $_SESSION['edit-post-success'];
                        unset($_SESSION['edit-post-success']);
                    ?>
                </p>
            </div>
        <!-- Hiển thị SỬA POST Thất bại -->
        <?php elseif(isset($_SESSION['edit-post'])) : ?>
            <div class="alert__message error container">
                <p>
                    <?= $_SESSION['edit-post'];
                        unset($_SESSION['edit-post']);
                    ?>
                </p>
            </div>
        <!-- Hiển thị Xóa POST Thất bại -->
        <?php elseif(isset($_SESSION['delete-post'])) : ?>
            <div class="alert__message error container">
                <p>
                    <?= $_SESSION['delete-post'];
                        unset($_SESSION['delete-post']);
                    ?>
                </p>
            </div>
        <!-- Hiển thị Xóa POST Thành Công -->
        <?php elseif(isset($_SESSION['delete-post-success'])) : ?>
            <div class="alert__message success container">
                <p>
                    <?= $_SESSION['delete-post-success'];
                        unset($_SESSION['delete-post-success']);
                    ?>
                </p>
            </div>
        <?php endif ?>
        <div class="container dashboard__container">
            <button id="show__sidebar-btn" class="sidebar__toggle"><i class="fas fa-chevron-right"></i></button>
            <button id="hide__sidebar-btn" class="sidebar__toggle"><i class="fas fa-chevron-left"></i></button>
            <aside>
                <ul>
                    <li>
                        <a href="add-post.php">
                            <i class="fas fa-pen"></i> 
                            <h5>Add Post</h5>
                        </a>
                    </li>
                    <li>
                        <a href="index.php"  class="active">
                            <i class="fas fa-file-alt"></i>
                            <h5>Manage Posts</h5>
                        </a>
                    </li>
                    <?php if(isset($_SESSION['user_is_admin'])) : ?>
                    <li>
                        <a href="add-user.php">
                            <i class="fas fa-user-plus"></i>
                            <h5>Add User</h5>
                        </a>
                    </li>
                    <li>
                        <a href="manage-users.php">
                            <i class="fas fa-users"></i>
                            <h5>Manage Users</h5>
                        </a>
                    </li>
                    <li>
                        <a href="add-category.php">
                            <i class="fas fa-pen"></i> 
                            <h5>Add Category</h5>
                        </a>
                    </li>
                    <li>
                        <a href="manage-categories.php" >
                            <i class="fas fa-list"></i>
                            <h5>Manage Categories</h5>
                        </a>
                    </li>
                    <?php endif ?>
                </ul>
            </aside>
            <main>
                <h2>Manage Users</h2>
                <?php if(mysqli_num_rows($posts)>0) : ?>
                    <table>
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($post_row=mysqli_fetch_assoc($posts)) : ?>
                                <?php
                                    $category_id=$post_row['category_id'];
                                    $category_query="SELECT title FROM categories WHERE id=$category_id";
                                    $category_result=mysqli_query($conn, $category_query);
                                    $category=mysqli_fetch_assoc($category_result);
                                ?>
                                <tr>
                                    <td><?= $post_row['title']?></td>
                                    <td><?= $category['title']?></td>
                                    <td><a href="<?= ROOT_URL ?>admin/edit-post.php?id=<?= $post_row['id'] ?>" class="btn sm">Edit</a></td>
                                    <td><a href="<?= ROOT_URL ?>admin/delete-post.php?id=<?= $post_row['id'] ?>" class="btn sm danger">Delete</a></td>
                                </tr>
                            <?php endwhile ?>
                        </tbody>
                    </table>
                <?php else :?>
                    <div class="alert__message error"><?= "No post found"?></div>
                <?php endif?>
            </main>
        </div>
    </section>

<?php
    include '../partials/footer.php';
?>