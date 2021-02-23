<?php

      //Session Creation
       session_start();
      // Get the database connection file
      require_once '../library/connections.php';
      // Get the PHP Motors model for use as needed
      require_once '../model/main-model.php';

      require_once '../model/accounts-model.php';
      // Get the functions library
      require_once '../library/functions.php';

      // getclassification
      $classifications = getClassifications();
      //navbar function
      $navList = navBarPopulate($classifications).nav1($classifications);

      $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
      if ($action == NULL){
      $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
      }

      switch ($action) {

         case 'register-form':
            include '../view/registration.php';
            break;


         case 'register':
            // Filter and store the data
              $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
              $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING);
              $clientEmail = filter_input(INPUT_POST, 'clientEmail',  FILTER_SANITIZE_EMAIL);
              $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);

              $clientEmail = checkEmail($clientEmail);
              $checkPassword = checkPassword($clientPassword);

              $existingEmail = checkExistingEmail($clientEmail);

               // Check for existing email address in the table
               $existingEmail = checkExistingEmail($clientEmail);
        if($existingEmail){
            $_SESSION['message'] = '<p class="notice">&nbsp; A user with that email address already exists. Do you want to login instead?</p>';
            include '../view/login.php';
            exit;
        }
                        
            // Check for missing data
            if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)){
              $message = '<p>&nbsp; Please provide information for all empty form fields.</p>';
              include '../view/registration.php';
              exit;
            }
            
            $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

            // Send the data to the model
            $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);
            
            // Check and report the result
            if($regOutcome === 1){
              setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
              $_SESSION['message'] ="<p>&nbsp; Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
              header('Location: /cse340/phpmotors/accounts/?action=login');
              exit;
            } else {
              $message = "<p> &nbsp; Sorry $clientFirstname, but the registration failed. Please try again.</p>";
              include '../view/registration.php';
              exit;
            }
            break;
            

         case 'login-form':
            include '../view/login.php';
         break;

         case 'Login':

            $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
            $clientEmail = checkEmail($clientEmail);
            $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
            $passwordCheck = checkPassword($clientPassword);

            $existingEmail = checkExistingEmail($clientEmail);

            // Run basic checks, return if errors
            if (empty($clientEmail) || empty($passwordCheck) || !$existingEmail) {
            $_SESSION['message'] = '<p class="notice">&nbsp; Please provide a valid email address and password.</p>';
            include '../view/login.php';
            exit;
            }

            // A valid password exists, proceed with the login process
            // Query the client data based on the email address
            $clientData = getClient($clientEmail);
            // Compare the password just submitted against
            // the hashed password for the matching client
            $hashCheck = password_verify($clientPassword, $clientData['clientPassword']);
            // If the hashes don't match create an error
            // and return to the login view
            if(!$hashCheck) {
            $_SESSION['message'] = '<p class="notice">&nbsp; Please check your password and try again.</p>';
            include '../view/login.php';
            exit;
            }
            // A valid user exists, log them in
            $_SESSION['loggedin'] = TRUE;
            // Remove the password from the array
            // the array_pop function removes the last
            // element from an array
            array_pop($clientData);
            // Store the array into the session
            $_SESSION['clientData'] = $clientData;
            // Send them to the admin view
            include '../view/admin.php';
            exit;
         break;


         case 'admin':
            include '../view/admin.php';
            break;
         case 'Logout':
        //destroy session
        $_SESSION = array();
        session_destroy();
        header('Location: /cse340/phpmotors');
        exit;  
        


         default:
            include '../view/login.php';
         break;
        }
?>