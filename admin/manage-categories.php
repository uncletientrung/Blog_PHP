<?php
    include 'partials/header.php';
    $query="SELECT * FROM categories ORDER BY  title ASC" ; // Lấy theo alpha
    $categories= mysqli_query($conn, $query);

?>

    <section class="dashboard">
        <!-- Hiển thị thêm CATEGORY THÀNH CÔNG -->
        <?php if(isset($_SESSION['add-category-success'])) : ?> 
            <div class="alert__message success container">
                <p>
                    <?= $_SESSION['add-category-success'];
                        unset($_SESSION['add-category-success']);
                    ?>
                </p>
            </div> 
        <!-- Hiển thị SỬA CATEGORY THÀNH CÔNG -->
        <?php elseif(isset($_SESSION['edit-category-success'])) : ?>
            <div class="alert__message success container">
                <p>
                    <?= $_SESSION['edit-category-success'];
                        unset($_SESSION['edit-category-success']);
                    ?>
                </p>
            </div>
        <!-- Hiển thị SỬA CATEGORY THẤT BẠI -->
        <?php elseif(isset($_SESSION['edit-category'])) : ?>
            <div class="alert__message error container">
                <p>
                    <?= $_SESSION['edit-category'];
                        unset($_SESSION['edit-category']);
                    ?>
                </p>
            </div>
        <!-- Hiển thị XÓA CATEGORY THÀNH CÔNG -->
        <?php elseif(isset($_SESSION['delete-category-success'])) : ?>
            <div class="alert__message success container">
                <p>
                    <?= $_SESSION['delete-category-success'];
                        unset($_SESSION['delete-category-success']);
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
                        <a href="index.php">
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
                        <a href="manage-categories.php" class="active">
                            <i class="fas fa-list"></i>
                            <h5>Manage Categories</h5>
                        </a>
                    </li>
                    <?php endif ?>
                </ul>
            </aside>
            <main>
                <h2>Manage Categories</h2>
                <?php if(mysqli_num_rows($categories)>0) : ?>
                    <table>
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <?php while($category_row =mysqli_fetch_assoc($categories)) : ?>
                            <tbody>
                                <tr>
                                    <td><?= $category_row['title']?></td>
                                    <td><a href="<?= ROOT_URL ?>admin/edit-category.php?id=<?= $category_row['id'] ?>" class="btn sm">Edit</a></td>
                                    <td><a href="<?= ROOT_URL ?>admin/delete-category.php?id=<?= $category_row['id'] ?>" class="btn sm danger">Delete</a></td>
                                </tr>
                            </tbody>
                        <?php endwhile ?>
                    </table>
                <?php else :?>
                    <div class="alert__message error"><?= "No categories found"?></div>
                <?php endif?>
            </main>
        </div>
    </section>

<?php
    include '../partials/footer.php';
?>