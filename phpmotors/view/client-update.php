<?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === FALSE) {
        header('Location: /phpmotors');
    }
    $clientFirstname = $_SESSION['clientData']['clientFirstname'];
    $clientLastname = $_SESSION['clientData']['clientLastname'];
    $clientEmail = $_SESSION['clientData']['clientEmail'];
    $clientId = $_SESSION['clientData']['clientId'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Motors Client Update</title>
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

        <h1>Update Account Information</h1>
        <?php if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];} ?>
       
        <form method="post" action="/cse340/phpmotors/accounts/index.php">
            <h2>Client Information</h2>
            <div class="container">
                <label>First Name</label><br>
                <input required type="text" name="clientFirstname" id="clientFirstname" <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";}  ?> ><br>
                <label>Last Name</label><br>
                <input required type="text" name="clientLastname" id="lname" <?php if(isset($clientLastname)){echo "value='$clientLastname'";}  ?> ><br>
                <label>Email</label><br>
                <input required type="email" name="clientEmail" id="email" <?php if(isset($clientEmail)){echo "value='$clientEmail'";}  ?> ><br>
                <input type="hidden" name="clientId" value="<?php if(isset($clientInfo['clientId'])){ echo $clientInfo['clientId'];} 
                                                            elseif(isset($clientId)){ echo $clientId; } ?>">
                <input type="submit" name="submit" id="regbtn" value="Update Info">
                <input type="hidden" name="action" value="updateClient">
            </div>
        </form>
        
        <form method="post" action="/cse340/phpmotors/accounts/index.php">
            <h2>Update Password</h2>
            <div class="container">
                <p>This change will update your password.</p>
                <span>(Must be at least 8 characters and have 1 uppercase letter number and special character.)</span><br>
                <input required type="password" name="clientPassword" id="password" pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br>
                <input type="hidden" name="clientId" value="<?php if(isset($clientInfo['clientId'])){ echo $clientInfo['clientId'];} 
                                                            elseif(isset($clientId)){ echo $clientId; } ?>">
                <input type="submit" name="submit" id="regbtn" value="Update Password">
                <input type="hidden" name="action" value="updatePassword">
            </div>
        </form>

        <?php    
            include 'footer.php';
        ?>
    </div>
    <script src="../js/script.js"></script>
</body>

</html>
<?php unset($_SESSION['message']); ?>