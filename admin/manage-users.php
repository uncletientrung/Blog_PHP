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
                        <a href="index.php">
                            <i class="fas fa-file-alt"></i>
                            <h5>Manage Posts</h5>
                        </a>
                    </li>
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
                        <tr>
                            <td>Trung</td>
                            <td>trunghachcf</td>
                            <td><a href="edit-user.php" class="btn sm">Edit</a></td>
                            <td><a href="delete-user.php" class="btn sm danger">Delete</a></td>
                            <td>Yes</td>
                        </tr>
                        <tr>
                            <td>Lang</td>
                            <td>langhachcf</td>
                            <td><a href="edit-user.php" class="btn sm">Edit</a></td>
                            <td><a href="delete-user.php" class="btn sm danger">Delete</a></td>
                            <td>No</td>
                        </tr>
                        <tr>
                            <td>Bam</td>
                            <td>bamhachcf</td>
                            <td><a href="edit-user.php" class="btn sm">Edit</a></td>
                            <td><a href="delete-user.php" class="btn sm danger">Delete</a></td>
                            <td>No</td>
                        </tr>
                        <tr>
                            <td>giang</td>
                            <td>gianghachcf</td>    
                            <td><a href="edit-user.php" class="btn sm">Edit</a></td>
                            <td><a href="delete-user.php" class="btn sm danger">Delete</a></td>
                            <td>No</td>
                        </tr>
                    </tbody>
                </table>
            </main>
        </div>
    </section>


<?php
    include '../partials/footer.php';
?>