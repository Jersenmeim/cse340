<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/cse340/phpmotors/css/style.css">
    
</head>
<body>
    <div class="bg">
        
        <header>
            <?php require $_SERVER['DOCUMENT_ROOT'].'/cse340/phpmotors/snippets/header.php'; ?>
        </header>

        <nav>
            <?php    
                echo $navList;
            ?>
        </nav>

        <?php
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
            }
        ?>
            <form method="post" action="/cse340/phpmotors/accounts/">

                <div class="container">
                <label for="clientEmail"><b>Username</b></label>
                <input type="email" name="clientEmail" id = "clientEmail" <?php if (isset($clientEmail)){echo "value='$clientEmail'";}?> required placeholder="Enter a valid email address">

                
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
   
    <script src="/cse340/phpmotors/js/script.js"></script>
   
</body>

</html>
<?php unset($_SESSION['message']); ?>