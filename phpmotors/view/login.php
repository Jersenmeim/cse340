<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/style.css">
    
</head>
<body>
    <div class="bg">
        <header>
            <img src="../images/site/logo.png" alt="phpmotor_logo">
            <div class="myaccount" >
            <?php    
                echo $account;
            ?>
            </div>
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
            <form action="#">

                <div class="container">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname"  id="uname" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw"  id="psw" required>

                <button type="submit">Login</button>
                <a href="?action=register-form">not a member yet?</a>

                </div>
        
            </form>
            

            <?php    
            include 'footer.php';
            ?>
        
    </div>
   
    <script src="../js/script.js"></script>
</body>

</html>