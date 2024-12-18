<?php
$title ="Livraison ";
ob_start();
?>
    <h1>Ici Index Livraison</h1>
 

<?php $content = ob_get_clean(); ?>

<?php $role=1; //$role= array(0 => Visitor, 1 => Admin, 2 => Seller)?>
<?php $varSell="Livraisons";$varData="Data";?>
<?php include 'c:/caisse191124/layout.php'?>