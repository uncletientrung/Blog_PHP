<?php
    require 'config/constants.php';
    $userName_Email=$_SESSION['signin-data']['userName_Email'] ?? null;
    unset($_SESSION['signin-data']);
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
            <?php if(isset($_SESSION['signup-success'])) :?>
                <div class="alert__message success">
                    <p>
                        <?= $_SESSION['signup-success'];
                            unset($_SESSION['signup-succes']);
                        ?>
                    </p>
                </div> 
            <?php elseif(isset($_SESSION['signin'])) :?>
                <div class="alert__message error">
                    <p>
                        <?= $_SESSION['signin'];
                            unset($_SESSION['signin']);
                        ?>
                    </p>
                </div>
            <?php endif ?>
            <form action="<?= ROOT_URL ?>signin-logic.php" method="POST">
                <input type="text" name="userName_Email" value="<?= $userName_Email?>" placeholder="Username or Email">
                <input type="password" name="password" placeholder="Password">
                <button type="submit" name="submit" class="btn">Sign In</button>
                <small>Don't have account? <a href="signup.php">Sign Up</a></small>
            </form>
        </div>
    </section>
</body>
</html>