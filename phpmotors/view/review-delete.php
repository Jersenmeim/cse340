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
      
        <div class="delete-reviews">
            <h2 class="form"><?php if(isset($revInfo['invMake']) && isset($revInfo['invModel'])){ 
		                             echo "Delete $revInfo[invMake] $revInfo[invModel] Review";} 
	                         ?></h2>
            <?php
            if (isset($message)) {
                echo $message; 
            } 
            ?>
            <p class="form">Reviewed on <?php if(isset($reviewDate)){echo date('F j, Y', strtotime($reviewDate));} elseif(isset($revInfo['reviewDate'])) {echo date('F j, Y', strtotime($revInfo['reviewDate'])); }?></p>
            <p class='form-msg'>Deletes cannot be undone. Are you sure you want to delete this review?</p>
            <form id="rev-del" method="post" action="/cse340/phpmotors/reviews/">                    
                         
                <label for="reviewText">Review Text</label>
                <textarea id="reviewText" name="reviewText" readonly><?php if(isset($revInfo['reviewText'])) {echo $revInfo['reviewText']; }?></textarea>

                <!-- Add the action name - value pair -->
                <input type="hidden" name="action" value="deleteReview">
                <input type="submit" name="submit" value="Delete Review" class="submitt">
                <input type="hidden" name="reviewId" value="<?php if(isset($revInfo['reviewId'])){ echo $revInfo['reviewId'];} ?>">

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