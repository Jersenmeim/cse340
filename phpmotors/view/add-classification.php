<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Classification</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="bg">
        <header>
            <?php require $_SERVER['DOCUMENT_ROOT'].'/cse340/phpmotors/snippets/header.php';?>
        </header>
        <nav>
            <?php echo $navList;?>
        </nav>
        <div class="container-vehicles">
            <a href="?action=return">Management Menu</a> 
        </div>
            <?php
                if (isset($message)) {
                echo $message;
                }
            ?>
            <form method="post" action="../vehicles/index.php">
                <div class="container">
                <label>Add Classification</label>
                <input type="text" name="classificationName" id="cname"  <?php if (isset($classificationName)){echo "value='$classificationName'";}?> required>
                <input type="submit" name="submit" id="regbtn" value="Add Classification">
                <input type="hidden" name="action" value="add-class" >
                </div>
            </form>

            <?php    
                include 'footer.php';
            ?>
    </div>
    <script src="../js/script.js"></script>
</body>
</html>