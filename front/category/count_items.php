<?php   
   $panier=[]; 
   //cookies:id_product=>quantity  
   for ($i=0; $i <1000 ; $i++) {       
    $cookie_name= (string) $i;
    if(isset($_COOKIE[$cookie_name])){
       if((int) $_COOKIE[$cookie_name] >0 ){
      $panier[(int) $cookie_name]=$_COOKIE[$cookie_name];       
       }
    }
   } 

   $countItems=count($panier);   
   setcookie("countItems","", time() - 3600);
   setcookie("countItems",$countItems,time() + (86400 * 30),'/');     
?>