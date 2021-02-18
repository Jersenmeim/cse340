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
                echo $maccount;
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
                <input type="email" name="clientEmail" <?php if (isset($clientEmail)){echo "value='$clientEmail'";}?> required placeholder="Enter a valid email address">

                
                <span>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span> 
                <input type="password" name="clientPassword" id="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">

                <button type="submit">Login</button>
                <input type="hidden" name="action" value="Login">
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