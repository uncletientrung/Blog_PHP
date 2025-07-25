<?php
    include 'partials/header.php';

?>

    <section class="dashboard">
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
                        <tr>
                            <td>Gumdam là gì</td>
                            <td>Red</td>
                            <td><a href="edit-post.php" class="btn sm">Edit</a></td>
                            <td><a href="delete-post.php" class="btn sm danger">Delete</a></td>
                        </tr>
                        <tr>
                            <td>Gumdam là gì</td>
                            <td>Red</td>
                            <td><a href="edit-post.php" class="btn sm">Edit</a></td>
                            <td><a href="delete-post.php" class="btn sm danger">Delete</a></td>
                        </tr>
                        <tr>
                            <td>Gumdam là gì</td>
                            <td>Red</td>
                            <td><a href="edit-post.php" class="btn sm">Edit</a></td>
                            <td><a href="delete-post.php" class="btn sm danger">Delete</a></td>
                        </tr>
                        <tr>
                            <td>Gumdam là gì</td>
                            <td>Red</td>
                            <td><a href="edit-post.php" class="btn sm">Edit</a></td>
                            <td><a href="delete-post.php" class="btn sm danger">Delete</a></td>
                        </tr>
                    </tbody>
                </table>
            </main>
        </div>
    </section>

<?php
    include '../partials/footer.php';
?>