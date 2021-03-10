<?php

//Session Creation
session_start();

// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';

require_once '../model/vehicles-model.php';
// Get the functions library
require_once '../library/functions.php';

//Get Classification List
$classifications = getClassifications();
//build navbar list
$navList = navBarPopulate($classifications);



$action = filter_input(INPUT_POST, 'action' , FILTER_SANITIZE_STRING);
if ($action == NULL){
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
}

switch ($action) {

  case 'login-form':
    include '../view/login.php';
  break;

  case 'add-vehicles':
    include '../view/add-vehicle.php';
  break;

  case 'add-classification':
    include '../view/add-classification.php';
  break;

  case 'add-class':
    // Filter and store the data
    $classificationName = filter_input(INPUT_POST, 'classificationName', FILTER_SANITIZE_STRING);


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
    $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING);
    $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING);
    $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING);
    $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING);
    $invThumbnail = filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_STRING);

    $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT,
    FILTER_FLAG_ALLOW_FRACTION);
    $invStock = filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_STRING);
    $invColor = filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_STRING );
    $classificationId = filter_input(INPUT_POST, 'classificationId',  FILTER_SANITIZE_STRING);



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
    header('location:/cse340/phpmotors/vehicles/');
    exit;
    } else {
    $message = "<p> &nbsp; Sorry The Vehicle, $invMake,
    $invModel Not Added. Please try again.</p>";
    header('location:/cse340/phpmotors/vehicles/');
    exit;
    }
  break;


  /* * ********************************** 
  * Get vehicles by classificationId 
  * Used for starting Update & Delete process 
  * ********************************** */ 
  case 'getInventoryItems': 
    // Get the classificationId 
    $classificationId = filter_input(INPUT_GET, 'classificationId', FILTER_SANITIZE_NUMBER_INT); 
    // Fetch the vehicles by classificationId from the DB 
    $inventoryArray = getInventoryByClassification($classificationId); 
    // Convert the array to a JSON object and send it back 
    echo json_encode($inventoryArray); 
    break;

    case 'updateVehicle':
    $classificationId = filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_NUMBER_INT);
    $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING);
    $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING);
    $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING);
    $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING);
    $invThumbnail = filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_STRING);
    $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $invStock = filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT);
    $invColor = filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_STRING);
    $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);

    if (empty($classificationId) || empty($invMake) || empty($invModel) 
    || empty($invDescription) || empty($invImage) || empty($invThumbnail)
    || empty($invPrice) || empty($invStock) || empty($invColor)) {
    $message = '<p>Please complete all information for the item! Double check the classification of the item.</p>';
    include '../view/vehicle-update.php';
    exit;
    }

    $updateResult = updateVehicle($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $classificationId, $invId);
    if ($updateResult) {
    $message = "<p class='notice'>Congratulations, the $invMake $invModel was successfully updated.</p>";
    $_SESSION['message'] = $message;
    header('location: /cse340/phpmotors/vehicles/');
    exit;
    } else {
    $message = "<p class='notice'>Error. the $invMake $invModel was not updated.</p>";
    include '../view/vehicle-update.php';
    exit;}
  break;

  case 'mod':
    $invId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $invInfo = getInvItemInfo($invId);
    if(count($invInfo)<1){
    $message = 'Sorry, no vehicle information could be found.';
    }
    include '../view/vehicle-update.php';
    exit;

    case 'del':
    $invId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $invInfo = getInvItemInfo($invId);
    if (count($invInfo) < 1) {
    $message = 'Sorry, no vehicle information could be found.';
    }
    include '../view/vehicle-delete.php';
    exit;
  break;

  case 'deleteVehicle':
    $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING);
    $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING);
    $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);

    $deleteResult = deleteVehicle($invId);
    if ($deleteResult) {
    $message = "<p class='notice'>Congratulations the, $invMake $invModel was	successfully deleted.</p>";
    $_SESSION['message'] = $message;
    header('location:/cse340/phpmotors/vehicles/');
    exit;
    } else {
    $message = "<p class='notice'>Error: $invMake $invModel was not
    deleted.</p>";
    $_SESSION['message'] = $message;
    header('location: /cse340/phpmotors/vehicles/');
    exit;
    }
  break;


  case 'classification':
    $classificationName = filter_input(INPUT_GET, 'classificationName', FILTER_SANITIZE_STRING);
    $vehicles = getVehiclesByClassification($classificationName);
    if(!count($vehicles)){
     $message = "<p class='notice'>Sorry, no $classificationName could be found.</p>";
    } else {
     $vehicleDisplay = buildVehiclesDisplay($vehicles);
    }
    
    include '../view/classification.php';
  break;

  case 'pullVehicleData':
    $vehicleId = filter_input(INPUT_GET, 'vehicleId', FILTER_SANITIZE_NUMBER_INT);
    $invInfo = getInvItemInfo($vehicleId);
    $_SESSION['message'] = null;
    if (!$invInfo) {
            $_SESSION['message'] = 'Sorry, no vehicle information could be found.';
        }
    else {
        $vehicle = vehicleDetailPage($invInfo);
    }
    include '../view/vehicle-detail.php';
  break;

  default:
      $classificationList = buildClassificationList($classifications);
      if(isset($_SESSION['loggedin']))
      {
      if ($_SESSION['loggedin'] === TRUE) 
      {
      if($_SESSION['clientData']['clientLevel'] > 1)
      {
      include '../view/vehicle-man.php';
      }
      else {header('Location: /cse340/phpmotors');}
      }
    } 
    else {header('Location: /cse340/phpmotors');
    }
  break;
}
?>