<?php $title ="index front user"; ?>
<?php  ob_start();  ?>
<?php  
   // le client doit se connecter 
?>

 

<?php $content = ob_get_clean(); ?>

<?php $role=0;//$role= array(0 => Visitor, 1 => Client, 2 => Seller, 3=> Admin)?>
<?php $varSell="Sell";$varData="Data";?>
<?php require_once 'layout.php';?>     