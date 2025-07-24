<?php
    require 'config/database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reponsive Multipage Blog Website</title>
    <link rel="stylesheet" href="css/style.css">      <!-- TRANG TRÍ HTML -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> <!-- ICONSCOUT -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
 
</head>

<body> 
    <section class="form__section">
        <div class="container form__section-container">
            <h2>Sign Up</h2>
            <div class="alert__message error">
                <p>This is an error message</p>
            </div>
            <form action="<?php ROOT_URL?>signup-logic.php" enctype="multipart/form-data" method="POST">
                <input type="text" name="first_name"placeholder="First Name">
                <input type="text" name="last_name"placeholder="Last Name">
                <input type="text" name="user_name" placeholder="Username">
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Create Password">
                <input type="password" name="confirm_password" placeholder="Confirm Password">
                <div class="form__control">
                    <label for="avatar">User Avatar</label>
                    <input type="file" name="avatar" id="avatar">
                </div>
                <button type="submit" name ="submit" class="btn">Sign Up</button>
                <small>Already have a account? <a href="signin.php">Sign In</a></small>
            </form>
        </div>
    </section>
</body>
</html>