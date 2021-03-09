<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="bg">
    <header>
            <img src="./images/site/logo.png" alt="phpmotor_logo">
            <div class="myaccount" >
                <a href="?action=login-page">My Account</a>
            </div>
        </header>

        <nav>
            <?php    
                echo $navList;
            ?>
        </nav>
       
            <h2>Content Here</h2>

        <?php    
            include 'footer.php';
        ?>
        
    </div>
   
    <script src="./js/script.js"></script>
</body>

</html>