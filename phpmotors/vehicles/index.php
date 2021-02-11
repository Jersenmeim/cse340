<?php

    

      // Get the database connection file
      require_once '../library/connections.php';
      // Get the PHP Motors model for use as needed
      require_once '../model/main-model.php';

      require_once '../model/vehicles-model.php';
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

        case 'login':
        include '../view/login.php';
        break;

        case 'return':
            include '../view/vehicle-man.php';
            break;

        case 'add-vehicles':
        include '../view/add-vehicle.php';
        break;

        case 'add-classification':
        include '../view/add-classification.php';
        break;

        case 'add-class':
            // Filter and store the data
              $classificationName = filter_input(INPUT_POST, 'classificationName');
            
            
            // Check for missing data
            if(empty($classificationName)){
              $message = '<p>&nbsp; Please provide information for all empty form fields.</p>';
              include '../view/add-classification.php';
              exit;
            }
            
            // Send the data to the model
            $regOutcome = regClassification($classificationName);
            
            // Check and report the result
            if($regOutcome === 1){
              $message = "<p>&nbsp; Classification $classificationName Added.</p>";
              include '../view/vehicle-man.php';
              exit;
            } else {
              $message = "<p> &nbsp; Sorry $classificationName, Not Added. Please try again.</p>";
              include '../view/add-classification.php';
              exit;
            }
        break;

            
        case 'add-vehicle':
            
            // Filter and store the data
              $invMake = filter_input(INPUT_POST, 'invMake');
              $invModel = filter_input(INPUT_POST, 'invModel');
              $invDescription = filter_input(INPUT_POST, 'invDescription');
              $invImage = filter_input(INPUT_POST, 'invImage');
              $invThumbnail = filter_input(INPUT_POST, 'invThumbnail');
              $invPrice = filter_input(INPUT_POST, 'invPrice');
              $invStock = filter_input(INPUT_POST, 'invStock');
              $invColor = filter_input(INPUT_POST, 'invColor');
              $classificationId = filter_input(INPUT_POST, 'classificationId');
            
          
            
            // Check for missing data
            if(empty($invMake) || empty($invModel) || empty($invDescription) || 
              empty($invImage) ||
              empty($invThumbnail) ||
              empty($invPrice) ||
              empty($invStock) ||
              empty($classificationId)
        ){
              $message = '<p>&nbsp; Please provide information for all empty form fields.</p>';
              include '../view/add-vehicle.php';
              exit;
            }
            
            // Send the data to the model
            $regOutcome = regVehicle(
                $invMake, 
                $invModel,
                $invDescription,  
                $invImage, 
                $invThumbnail,
                $invPrice,
                $invStock,
                $invColor,
            $classificationId);
                                    
            // Check and report the result
            if($regOutcome === 1){
              $message = "<p>&nbsp; New Vehicle $invMake, 
              $invModel Added.</p>";
              include '../view/vehicle-man.php';
              exit;
            } else {
              $message = "<p> &nbsp; Sorry The Vehicle, $invMake, 
              $invModel Not Added. Please try again.</p>";
              include '../view/add-vehicle.php';
              exit;
            }
        break;

        default:
        include '../view/vehicle-man.php';
        break;
        }
?>