<?php
function navBarPopulate($carclassifications) {
   // Build a navigation bar using the $classifications array
   $navList = '<ul>';
   $navList .= "<li><a href='./index.php' title='View the PHP Motors home page'>Home</a></li>";
   foreach ($carclassifications as $classification) {
    $navList .= "<li><a href='./index.php?action=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
   }
   $navList .= '</ul>';
   return $navList;
}
?>  

