<?php

    

      // Get the database connection file
      require_once '../library/connections.php';
      // Get the PHP Motors model for use as needed
      require_once '../model/main-model.php';

      require_once '../model/accounts-model.php';
      // Get the functions library
      //require_once 'library/functions.php';


      $classifications = getClassifications();

      //Navigation Link
      $navList = '<ul>';
      $navList .= "<li><a href='../index.php' title='View the PHP Motors home page'>Home</a></li>";
      foreach ($classifications as $classification) {
      $navList .= "<li><a href='../index.php?action=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
      }
      $navList .= '</ul>';

      $account = '<a href="../accounts/index.php?action=login">My Account</a>';


      $action = filter_input(INPUT_POST, 'action');
      if ($action == NULL){
      $action = filter_input(INPUT_GET, 'action');
      }

      switch ($action) {

         case 'register-form':
            include '../view/registration.php';
            break;


         case 'register':
            // Filter and store the data
              $clientFirstname = filter_input(INPUT_POST, 'clientFirstname');
              $clientLastname = filter_input(INPUT_POST, 'clientLastname');
              $clientEmail = filter_input(INPUT_POST, 'clientEmail');
              $clientPassword = filter_input(INPUT_POST, 'clientPassword');
            
            // Check for missing data
            if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($clientPassword)){
              $message = '<p>&nbsp; Please provide information for all empty form fields.</p>';
              include '../view/registration.php';
              exit;
            }
            
            // Send the data to the model
            $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $clientPassword);
            
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
            

         case 'home':
            include '../view/home.php';
         break;


         case 'login':
            include '../view/login.php';
         break;


         default:
            include '../view/login.php';
         break;
        }
?>