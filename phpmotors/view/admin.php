<?php
 if(isset($_SESSION['loggedin']))
 {
   if ($_SESSION['loggedin'] === TRUE) 
     {
        
     }
   
   
 } 
 else {header('Location: /cse340/phpmotors');
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
        <h1><?php echo $_SESSION['clientData']['clientFirstname']; ?></h1>
        
        <ul>
            <li>First Name: <?php echo $_SESSION['clientData']['clientFirstname']; ?></li>
            <li>Last Name: <?php echo $_SESSION['clientData']['clientLastname']; ?></li>
            <li>Email: <?php echo $_SESSION['clientData']['clientEmail']; ?></li>
            <li>Client Level: <?php echo $_SESSION['clientData']['clientLevel']; ?></li>
        </ul>
        
        

        <?php if ($_SESSION['clientData']['clientLevel'] > 1) {echo '<h2>Inventory Management</h2>
                                                        <p>Use this link to manage the inventory.</p>
                                                        <p><a href="/cse340/phpmotors/vehicles">Vehicle Management</a></p>';} ?> 


        <p>You are logged in.</p>  
        
        </div>
      
          

            <?php    
            include 'footer.php';
            ?>
        
    </div>
   
    <script src="/cse340/phpmotors/js/script.js"></script>
</body>

</html>