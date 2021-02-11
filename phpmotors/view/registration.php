<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="bg">
        <header>
            <img src="../images/site/logo.png" alt="phpmotor_logo">
            <div class="myaccount"><a href="?action=login-page">My Account</a></div>
        </header>

        <nav>
            <?php    
                echo $navList;
            ?>
        </nav>


        <?php
        if (isset($message)) {
        echo $message;
        }
        ?>

        <form method="post" action="../accounts/index.php">
        <div class="container">
            <label>First Name</label>
            <input type="text" name="clientFirstname" id="fname">
            <label>Last Name</label>
            <input type="text" name="clientLastname" id="lname">
            <label>Email</label>
            <input type="email" name="clientEmail" id="email">
            <label>Password</label>
            <input type="password" name="clientPassword" id="password">
            <input type="submit" name="submit" id="regbtn" value="Register">
            <input type="hidden" name="action" value="register" >
        </div>
        </form>
            <?php    
            include 'footer.php';
            ?>
    </div>
   
    <script src="../js/script.js"></script>
</body>

</html>