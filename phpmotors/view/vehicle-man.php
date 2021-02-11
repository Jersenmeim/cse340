<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Management</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/vehicles.css">
</head>
<body>
    <div class="bg">
        <header>
            <img src="../images/site/logo.png" alt="phpmotor_logo">
            <div class="myaccount"><?php echo $account;?></div>
        </header>

        <nav>
            <?php echo $navList;?>
        </nav>

        <?php
                if (isset($message)) {
                    echo $message;
                    }
        ?>
            
        <div class="container-vehicles">
            <a href="?action=add-classification">Add Classification</a> 
            <a href="?action=add-vehicles">Add Vehicle</a> 
        </div>
            

        <?php    
            include 'footer.php';
        ?>
        
    </div>
   
    <script src="../js/script.js"></script>
</body>

</html>