<?php
    include 'partials/header.php';

    // Quản lý dữ liệu nhân viên
    $current_admin_id= $_SESSION['user-id'];
    $query="SELECT * FROM users WHERE NOT id=$current_admin_id";
    $users=mysqli_query($conn, $query);
?>

    <section class="dashboard">
        <!-- Hiển thị thêm thành công -->
        <?php if(isset($_SESSION['add-user-success'])) : ?> 
            <div class="alert__message success container">
                <p>
                    <?= $_SESSION['add-user-success'];
                        unset($_SESSION['add-user-success']);
                    ?>
                </p>
            </div> 
        <!-- Hiển thị sửa thành công -->
        <?php elseif(isset($_SESSION['edit-user-success'])) : ?>
            <div class="alert__message success container">
                <p>
                    <?= $_SESSION['edit-user-success'];
                        unset($_SESSION['edit-user-success']);
                    ?>
                </p>
            </div> 
        <!-- Hiển thị sửa thất bại -->
        <?php elseif(isset($_SESSION['edit-user'])) : ?>
            <div class="alert__message error container">
                <p>
                    <?= $_SESSION['edit-user'];
                        unset($_SESSION['edit-user']);
                    ?>
                </p>
            </div>
        <!-- Hiển thị XÓA THẤT BẠI -->
        <?php elseif(isset($_SESSION['delete-user'])) : ?>
            <div class="alert__message success container">
                <p>
                    <?= $_SESSION['delete-user'];
                        unset($_SESSION['delete-user']);
                    ?>
                </p>
            </div>
        <!-- Hiển thị XÓA THÀNH CÔNG -->
        <?php elseif(isset($_SESSION['delete-user-success'])) : ?>
            <div class="alert__message success container">
                <p>
                    <?= $_SESSION['delete-user-success'];
                        unset($_SESSION['delete-user-success']);
                    ?>
                </p>
            </div>
        <?php  endif  ?>
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
                        <a href="manage-users.php" class="active">
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
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            <th>Admin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($user_row = mysqli_fetch_assoc($users)) : ?>
                            <tr>
                                <td><?= $user_row['first_name'] . ' ' . $user_row['last_name'] ?></td>
                                <td><?= $user_row['user_name'] ?></td>
                                <td><a href="<?= ROOT_URL?>admin/edit-user.php?id=<?= $user_row['id']?>" class="btn sm">
                                    Edit</a> <!-- Page_Layout -->
                                </td>
                                <td><a href="<?= ROOT_URL?>admin/delete-user.php?id=<?= $user_row['id']?>" class="btn sm danger">
                                    Delete</a> 
                                    <!-- Page_Layout -->
                                </td>
                                <td> <?= $user_row['is_admin'] ? 'Yes' : 'No' ?> </td> <!-- If else nhanh -->
                            </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </main>
        </div>
    </section>


<?php
    include '../partials/footer.php';
?>