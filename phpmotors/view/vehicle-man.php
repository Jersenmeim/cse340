<?php
    if ($_SESSION['clientData']['clientLevel'] < 2) {
    header('location: /phpmotors/');
    exit;
    }
    if (isset($_SESSION['message'])) {
        $message = $_SESSION['message'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Management</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="bg">
        <header>
            <?php require $_SERVER['DOCUMENT_ROOT'].'/cse340/phpmotors/snippets/header.php'; ?>
        </header>

        <nav>
            <?php echo $navList;?>
        </nav>

     
        <div class="container-vehicles">
            <a href="?action=add-classification">Add Classification</a> 
            <a href="?action=add-vehicles">Add Vehicle</a> 

            <?php
                if (isset($message)) { 
                echo $message; 
                } 
                if (isset($classificationList)) { 
                echo '<h2>Vehicles By Classification</h2>'; 
                echo '<p>Choose a classification to see those vehicles</p>'; 
                echo $classificationList; 
                }
            ?>
        </div>
        

    <noscript>
        <p><strong>JavaScript Must Be Enabled to Use this Page.</strong></p>
    </noscript>

    <table id="inventoryDisplay"></table>
        <?php    
            include 'footer.php';
        ?>
    </div>
    <script src="../js/inventory.js"></script>
    <script src="../js/script.js"></script>
</body>

</html>
<?php unset($_SESSION['message']); ?>