<?php

 $idCategory=$_GET['id'];

 if(isset($_POST['ajouter'])){

  $idProduct = $_POST['idProduct']; 
  $qty = $_POST['qtyInput']; 

  $name_cookie=$idProduct;
  $cookie_value = $qty;
  setcookie($name_cookie,$cookie_value,time() + (86400 * 30),'/'); 
   //// 86400 = 1 day

  header("location:categorie.php?id=$idCategory");
 } 
 
 

    
    


  
    

  
/*
$cookie_name = "panier";
$cookie_value = "la perseverence fini par payer";

//create a cookie:
setcookie($cookie_name,$cookie_value); 

//retreive cookie:
$cookie_retreive=$_COOKIE[$cookie_name];

//delete a cookie:
setcookie($cookie_name,"", time() - 3600);

echo count($panier);

echo "<pre>";
var_dump($panier);
echo "</pre>";

if(!isset($panier)){
  $panier=[];
}

*/
