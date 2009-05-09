<?php defined('SYSPATH') or die('No direct script access.');
 
class arr extends arr_Core {

	//array to string 
	 function arraytostr ($array=array()) { 
	  
	      $length = 0; 
	      $keystring = "";
	      $valuestring = "";
	      foreach ($array as $key => $value) { 
	           $keystring .= "$key "; 
	           $valuestring .= "$value "; 
	           $length++; 
	      } 
	          
	      return implode('.',array(trim($length),trim($keystring),trim($valuestring))); 
	 } 
	  
	 //sting to array     
	 function strtoarray ($str) {
	 	
	 	$arr = explode('.',$str);
	 	$length=$arr[0];
	 	$keystring=$arr[1];
	 	$valuestring=$arr[2];
	    $keys = explode(" ",$keystring); 
	    $values = explode(" ",$valuestring); 
	    for ($i=0; $i < $length; $i++) { 
	    	$key = $keys[$i]; 
	    	$newarray[$key] = $values[$i]; 
	    }           
	    return $newarray; 
	}   
}
?>