<?php
    include 'partials/header.php';
    if(isset($_GET['id'])){ // Cái này đã được đẩy lên từ khi ấn Edit. Sau Đó lấy đường dẫn GET 
        $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT); // Làm sạch đường dẫn GET chỉ lấy số
        $query= "SELECT * FROM users WHERE id=$id";
        $result= mysqli_query($conn, $query);
        $user = mysqli_fetch_assoc($result);
    }else{
        header('location:' .ROOT_URL.'admin/manage-users.php');
    }
?>
    <section class="form__section">
        <div class="container form__section-container">
            <h2>Edit User</h2>
            <form action="<?= ROOT_URL?>admin/edit-user-logic.php" enctype="multipart/form-data" method="POST">
                <input type="hidden" name="id" value="<?= $user['id']?>">
                <input type="text" placeholder="First Name" name="first_name" value="<?= $user['first_name']?>">
                <input type="text" placeholder="Last Name" name="last_name"value="<?= $user['last_name']?>">
                <select name="user_role">
                    <option value="0" <?= $user['is_admin']== 0 ? 'selected' : ''?> >Author</option>
                    <option value="1" <?= $user['is_admin']== 1 ? 'selected' : ''?>>Admin</option>
                </select>
                <button type="submit" class="btn" name="submit">Update User</button>
            </form>
        </div>
    </section>
    <!-- XONG FORM ADD CATEGORY -->

<?php
    include '../partials/footer.php';
?>