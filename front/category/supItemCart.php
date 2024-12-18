<?php

  

  var_dump($_GET['id']);

  setcookie($_GET['id'],"",time()-3600);
/*
setcookie($_GET['id'], "", time() - 3600);

header('location:panier.php');   

*/
?>

