<?php

    

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
              $message = "<p>&nbsp; Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
              include '../view/login.php';
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
           
         break;

        


         default:
            include '../view/login.php';
         break;
        }
?>