<?php
if(!$_SESSION['loggedin']){
    header('Location: /cse340/phpmotors/');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>logged in | Confirmation</title>
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
        <div class="admin">
        <!-- <p>You are logged in.</p>   -->
            <h2><?php echo $_SESSION['clientData']['clientFirstname']; ?></h2>
            
            <ul>
                <li>First Name: <?php echo $_SESSION['clientData']['clientFirstname']; ?></li>
                <li>Last Name: <?php echo $_SESSION['clientData']['clientLastname']; ?></li>
                <li>Email: <?php echo $_SESSION['clientData']['clientEmail']; ?></li>
            </ul>
            
            

            <?php if (($_SESSION['clientData']['clientLevel'] == 1) || ($_SESSION['clientData']['clientLevel'] == 3)) {echo '<h3>Account Management</h3>
                                                            <p>Use this link to manage your account.</p>
                                                            <p><a href="/cse340/phpmotors/accounts?action=update-page">Account Management</a></p>';} ?> 
            <?php if ($_SESSION['clientData']['clientLevel'] > 1) {echo '<h3>Inventory Management</h3>
                                                            <p>Use this link to manage the inventory.</p>
                                                            <p><a href="/cse340/phpmotors/vehicles">Vehicle Management</a></p>';} ?> 
             <h3>Manage Your Product Reviews</h3>
             <div>
             <?php
                if (isset($_SESSION['message-rev'])) { ?>
                    <p class ="msg"> <?php  echo $_SESSION['message-rev']; ?> </p>
                <?php } ?>
                <!-- unset($_SESSION['message-rev']); ?> -->
                <?php 
                if(isset($_SESSION['reviewsList'])){
                    echo $_SESSION['reviewsList'];
                }
                ?>

           
             </div>
            
        </div>
      
        <?php    
        include 'footer.php';
        ?>
    </div>
   
    <script src="/cse340/phpmotors/js/script.js"></script>
</body>

</html>