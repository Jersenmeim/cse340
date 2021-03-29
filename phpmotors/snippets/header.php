<img id="logo" src="/cse340/phpmotors/images/vehicles/site/logo.png" alt="Company Logo">

<?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] = TRUE){
$cookieFirstname = $_SESSION['clientData']['clientFirstname'];
 echo "<span><a href='/cse340/phpmotors/accounts/index.php/?action=admin'>Welcome, $cookieFirstname</a> </span>";
} ?>

<?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] = TRUE) {
        if ($_SESSION['loggedin'] === TRUE) {echo '<a id="acctLink" href="/cse340/phpmotors/accounts/index.php/?action=Logout">Logout</a>';}
 } else {echo '<a id="acctLink" href="/cse340/phpmotors/accounts/index.php/?action=login-form">My Account</a>';
        } ?> 

