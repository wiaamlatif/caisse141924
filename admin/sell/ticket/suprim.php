<?php
$title ="Delete ticket";
ob_start();
?>

<?php
$id = $_GET['id'];

require_once 'C:/caisse191124/include/database.php';

$sql ="DELETE FROM tickets
       WHERE tickets.id_ticket =?;";

$sqlPdo = $pdo -> prepare($sql);
$sqlPdo -> execute([$id]);

$sql ="DELETE FROM lignes_ticket
       WHERE lignes_ticket.id_ticket =?;";

$sqlPdo = $pdo -> prepare($sql);
$sqlPdo -> execute([$id]);

//Redirection
header('location:index.php');
?>    
 

<?php $content = ob_get_clean(); ?>

<?php $role=1; //$role= array(0 => Visitor, 1 => Admin, 2 => Seller)?>
<?php $varSell="Tickets";$varData="Data";?>
<?php include "c:/caisse191124/layout.php" ?>