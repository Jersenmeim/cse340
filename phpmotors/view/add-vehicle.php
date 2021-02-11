<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Vehicle</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/vehicles.css">
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
                <h3>Add Vehicle</h3>

                <label>Choose a car Classification</label>
                
                &nbsp; 
                 <?php
                    
                    $mysqli = NEW MySQLi ('localhost', 'root', '', 'phpmotors');

                    $result = $mysqli->query("SELECT classificationid, classificationName 
                    FROM carclassification");
                ?>
                <select name="classificationId">
                    <?php
                        // Open your drop down box
                        
                        // Loop through the query results, outputing the options one by one
                        while ($row = $result->fetch_assoc()) {

                            $classificationid = $row['classificationid'];
                            
                            $classificationName = $row['classificationName'];
                        echo "<option value=$classificationid>$classificationName</option>";
                        }
                        
                        ?>
                        
                </select>
               
                <br>&nbsp;
                <label>Make</label>
                <input type="text" name="invMake" id="mname">
                <label>What Model?</label>
                <input type="text" name="invModel" id="moname">
                <label>Description</label>
                <textarea name="invDescription" id="dcname" cols="30" rows="5"></textarea>
                <label>Image</label>
                <input type="text" name="invImage" id="imagefile" value="/images/no-image.jpg">
                <!-- value="/images/no-image.jpg" -->
                <label>Thumbnail</label>
                <input type="text" name="invThumbnail" id="thumbnailfile" value="/images/no-image.jpg" >
                <!-- value="/images/no-image.jpg" -->


                <label>Price</label>
                <input type="number" name="invPrice" id="prname">
                <label>Color</label>
                <input type="text" name="invColor" id="coname">
                <label>Stocks left?</label>
                <input type="number" name="invStock" id="stockname">
                
                

                <input type="submit" name="submit" id="regbtn" value="Add Vehicle">
                <input type="hidden" name="action" value="add-vehicle" >
                </div>
            </form>

        <?php    
            include 'footer.php';
        ?>
        
    </div>
   
    <script src="../js/script.js"></script>
</body>

</html>