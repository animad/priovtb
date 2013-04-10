<?php

function array_flat($array, &$newArray = Array() ,$prefix='',$delimiter='|') { 
  foreach ($array as $key => $child) { 
    if (is_array($child)) { 
      $newPrefix = $prefix.$key.$delimiter; 
      $newArray =& array_flat($child, $newArray ,$newPrefix, $delimiter); 
    } else { 
      $newArray[$prefix.$key] = $child; 
    } 
  } 
  return $newArray; 
} 

?>
