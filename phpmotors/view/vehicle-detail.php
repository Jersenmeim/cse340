<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details | PHP Motors, Inc.</title>
    <link rel="stylesheet" href="../css/style.css">
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
      
            <div class="detail-container">
            <?php echo $vehicle; ?>
                <div id="thumbnails">
                    <?php 
                    if(isset($thumbnailsDisplay)){
                    echo $thumbnailsDisplay;
                    } 
                    ?>
                </div>
            </div>
            


        <?php    
        include 'footer.php';
        ?>
        
    </div>
   
    <script src="../js/script.js"></script>
</body>

</html>
<?php unset($_SESSION['message']); ?>