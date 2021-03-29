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
      
        <div class="update-reviews">
            <h2 class="form"><?php if(isset($revInfo['invMake']) && isset($revInfo['invModel'])){ 
		                             echo "Update $revInfo[invMake] $revInfo[invModel] Review";} 
	                               elseif(isset($invMake) && isset($invModel)) { 
		                             echo "Update $invMake $invModel Review"; }?></h2>
            <?php
            if (isset($message)) {
                echo $message;
            } 
            ?>

            <p class="form">Reviewed on <?php if(isset($reviewDate)){echo date('F j, Y', strtotime($reviewDate));} elseif(isset($revInfo['reviewDate'])) {echo date('F j, Y', strtotime($revInfo['reviewDate'])); }?></p>
            <form id="updt-rev" method="post" action="/cse340/phpmotors/reviews/">
                
                <label for="reviewText">Review Information</label>
                <textarea id="reviewText" placeholder="Enter review" name="reviewText" required><?php if(isset($reviewText)){echo $reviewText;} elseif(isset($revInfo['reviewText'])) {echo $revInfo['reviewText']; }?></textarea>
                
                <!-- Add the action name - value pair -->
                <input type="hidden" name="action" value="updateReview">
                <input type="submit" name="submit" value="Update Review" class="submitt">
                <input type="hidden" name="reviewId" value="<?php if(isset($revInfo['reviewId'])){ echo $revInfo['reviewId'];} elseif(isset($reviewId)){ echo $reviewId; } ?>">
            </form>
        </div>

        <?php    
        include 'footer.php';
        ?>
        
    </div>
   
    <script src="../js/script.js"></script>
</body>

</html>
<?php unset($_SESSION['message']); ?>