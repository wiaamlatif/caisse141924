
<?php
$title ="Data Client";
ob_start();
?>
    <h1>Ici Index Client</h1>
 

<?php $content = ob_get_clean(); ?>

<?php $role=1; //$role= array(0 => Visitor, 1 => Admin, 2 => Seller)?>
<?php $varSell="Sell";$varData="Clients";?>
<?php include 'c:/caisse191124/layout.php'?>
