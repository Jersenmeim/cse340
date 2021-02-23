<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet"  href="/cse340/phpmotors/css/style.css">
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


        <?php
        if (isset($message)) {
        echo $message;
        }
        ?>

        <form method="post" action="../index.php">
        <div class="container">
            <label>First Name</label>
            <input type="text" name="clientFirstname" id="fname"  <?php if (isset($clientFirstname)){echo "value='$clientFirstname'";}?> required>
            <label>Last Name</label>
            <input type="text" name="clientLastname" id="lname"  <?php if (isset($clientLastname)){echo "value='$clientLastname'";}?> required>
            <label>Email</label>
            <input type="email" name="clientEmail" id="email"  <?php if (isset($clientEmail)){echo "value='$clientEmail'";}?> required>
            <label for="clientPassword">Password:</label> 
            <span>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span> 
            <input type="password" name="clientPassword" id="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
            <input type="submit" name="submit" id="regbtn" value="Register">
            <input type="hidden" name="action" value="register" >
        </div>
        </form>
            <?php    
            include 'footer.php';
            ?>
    </div>
   
    <script src="../js/script.js"></script>
</body>

</html>