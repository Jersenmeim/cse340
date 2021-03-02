

<?php



// Build the navigation option list


function navBarPopulate($classifications) {
   // Build a navigation bar using the $classifications array
   $navList = '<ul>';
      
      $navList .= '<li>
      
      <a href="/cse340/phpmotors/index.php"  title="View the PHP Motors home page">Home</a></li>';
      foreach ($classifications as $classification) {
       $navList .= "<li><a href='/cse340/phpmotors/index.php?action=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
      }
      $navList .= '</ul>';
      return $navList;
}

// Check Email
function checkEmail($clientEmail){
   $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
   return $valEmail;
}

//Check Password

function checkPassword($clientPassword){
   $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])(?=.*[A-Z])(?=.*[a-z])([^\s]){8,}$/';
 return preg_match($pattern, $clientPassword);
}

// Build the classifications option list
function buildClassificationList($classifications){ 
   $classificationList = '<select name="classificationId" id="classificationList">'; 
   $classificationList .= "<option>Choose a Classification</option>"; 
   foreach ($classifications as $classification) { 
    $classificationList .= "<option value='$classification[classificationId]'>$classification[classificationName]</option>"; 
   } 
   $classificationList .= '</select>'; 
   return $classificationList; 
  }

function getInventoryByClassification($classificationId){ 
   $db = phpmotorsConnect(); 
   $sql = ' SELECT * FROM inventory WHERE classificationId = :classificationId'; 
   $stmt = $db->prepare($sql); 
   $stmt->bindValue(':classificationId', $classificationId, PDO::PARAM_INT); 
   $stmt->execute(); 
   $inventory = $stmt->fetchAll(PDO::FETCH_ASSOC); 
   $stmt->closeCursor(); 
   return $inventory; 
  }


?>  

