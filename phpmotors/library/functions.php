

<?php



// Build the navigation option list


function navBarPopulate($classifications) {
   // Build a navigation bar using the $classifications array
  
   
   function nav1($classifications){
      $navList = '<ul>';
      
      $navList .= '<li>
      
      <a href="../index.php?action="  title="View the PHP Motors home page">Home</a></li>';
      foreach ($classifications as $classification) {
       $navList .= "<li><a href='../index.php?action=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
      }
      $navList .= '</ul>';
      return $navList;
   }

   function nav2($classifications){

      $navList = '<ul>';
      $navList .= '<li>
      <a href="./index.php?action="  title="View the PHP Motors home page">Home</a></li>';
      foreach ($classifications as $classification) {
       $navList .= "<li><a href='./index.php?action=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
      };
      $navList .= '</ul>';
      return $navList;

      }

   

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
      $classifList = '<select name="classificationId" id="classificationId">';
      

      foreach ($classifications as $classification) {
      $classifList .= "<option value='$classification[classificationId]'";
      if(isset($classificationId)){
      if($classification['classificationId'] === $classificationId){
      $classifList .= ' selected ';
      }
      } elseif(isset($invInfo['classificationId'])){
      if($classification['classificationId'] === $invInfo['classificationId']){
      $classifList .= ' selected ';
      }
      }
      $classifList .= ">$classification[classificationName]</option>";
      }
      $classifList .= '</select>';
      return  $classifList;
}



?>  

