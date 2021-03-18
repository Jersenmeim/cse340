<?php
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Management</title>
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
        <?php
                if (isset($message)) {
                echo $message;
                } 
                ?>
        <div class="image-upload">
            <div class="container-images">
                <h1> Image Management </h1>
                <p>Choose one of the options below:</p>
                <h2>Add New Vehicle Image</h2>
              

                <form action="/cse340/phpmotors/uploads/" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <label>Vehicle</label><?php echo $prodSelect; ?>
                    </fieldset>
                    <fieldset>
                        <label>Is this the main image for the vehicle?</label>
                        <div>
                        <label for="priYes" class="pImage">Yes</label><input type="radio" name="imgPrimary" id="priYes" class="pImage" value="1">
                        </div>
                        <div>
                        <label for="priNo" class="pImage">No</label><input type="radio" name="imgPrimary" id="priNo" class="pImage" checked value="0">
                        </div>
                       
                    </fieldset>
                    <fieldset>
                    <label>Upload Image:</label>
                      
                            <input type="file" name="file1" >
                        <div>
                            <input type="submit" class="regbtn" value="Upload">
                            <input type="hidden" name="action" value="upload">
                        </div>
                    </fieldset>
                </form> 

                <h2>Existing Images</h2>
                <p class="notice">If deleting an image, delete the thumbnail too and vice versa.</p>
               

                
            </div>
            <hr>
            <?php
                if (isset($imageDisplay)) {
                echo $imageDisplay;
                } 
            ?>
        </div>
        
        <?php    
            include 'footer.php';
        ?>
    </div>



   
    <script src="../js/script.js"></script>
</body>

</html>
<?php unset($_SESSION['message']); ?>