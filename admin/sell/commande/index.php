<?php
$title ="Commandes ";
ob_start();
?>
    <h1>Ici Index Commande</h1>
 

<?php $content = ob_get_clean(); ?>

<?php $role=1; //$role= array(0 => Visitor, 1 => Admin, 2 => Seller)?>
<?php $varSell="Commandes";$varData="Data";?>
<?php include 'c:/caisse191124/layout.php'?>