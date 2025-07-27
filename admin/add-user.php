<?php
    include 'partials/header.php';
    $first_name=$_SESSION['add-user-data']['first_name'] ?? null; 
    $last_name=$_SESSION['add-user-data']['last_name'] ?? null;
    $user_name=$_SESSION['add-user-data']['user_name'] ?? null;
    $email=$_SESSION['add-user-data']['email'] ?? null;
    $pass1=$_SESSION['add-user-data']['pass1'] ?? null;
    $pass2=$_SESSION['add-user-data']['pass2'] ?? null;
    $user_role=$_SESSION['add-user-data']['user_role'] ?? null;
    unset($_SESSION['add-user-data']);
?>
    <section class="form__section">
        <div class="container form__section-container">
            <h2>Add User</h2>
            <?php if(isset($_SESSION['add-user-success'])) :?>
                <div class="alert__message success">
                    <p>
                        <?= $_SESSION['add-user-success'];
                            unset($_SESSION['add-user-succes']);
                        ?>
                    </p>
                </div> 
            <?php elseif(isset($_SESSION['add-user'])) :?>
                <div class="alert__message error">
                    <p>
                        <?= $_SESSION['add-user'];
                            unset($_SESSION['add-user']);
                        ?>
                    </p>
                </div>
            <?php endif ?>
            <form action="<?= ROOT_URL ?>admin/add-user-logic.php" enctype="multipart/form-data" method="POST">
                <input type="text" name="first_name" placeholder="First Name" value="<?=$first_name ?>">
                <input type="text" name="last_name" placeholder="Last Name" value="<?=$last_name ?>">
                <input type="text" name="user_name" placeholder="Username" value="<?=$user_name ?>">
                <input type="email" name="email" placeholder="Email" value="<?=$email ?>">
                <input type="password" name="pass1" placeholder="Create Password" >
                <input type="password" name="pass2" placeholder="Confirm Password">
                <div class="form__control">
                    <label for="avatar">User Avatar</label>
                    <input type="file" name="avatar" id="avatar">
                </div> 
                <select name="user_role" value="<?=$first_name ?>">
                    <option value="0">Author</option>
                    <option value="1">Admin</option>
                </select>
                <button type="submit" name="submit" class="btn">Add User</button>
            </form>
        </div>
    </section>
    <!-- XONG FORM ADD CATEGORY -->

<?php
    include '../partials/footer.php';
?>