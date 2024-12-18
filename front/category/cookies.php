<?php
//$cookie_name = "countItem";
//setcookie($cookie_name,0);   

//Delete cookie named $i
for ($i=0; $i < 20; $i++) { 
  $cookie_name=$i;
  setcookie($cookie_name,"", time() - 3600);   
}

//Delete cookie named singleSubmit
$cookie_name="singleSubmit";
setcookie($cookie_name,"", time() - 3600);

$cookie_name="countItem";
setcookie($cookie_name,"", time() -3600);



