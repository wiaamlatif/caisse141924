<?php $title ="Edit TK"; ?>

<?php 
// lignes ticket( id_product, quantity) -> cookies
$id=(int) $_GET['id'];
require_once 'C:/caisse191124/include/database.php';

$sql = "SELECT * FROM lignes_ticket 
        WHERE lignes_ticket.id_ticket=?";
        
$sqlstm = $pdo -> prepare($sql);
$sqlstm -> execute([$id]);    
$lignesTicket = $sqlstm -> fetchAll(PDO::FETCH_ASSOC);

$panierProduct=[]; // $panierProduct['id_ligne_ticket']="id_product";
$panierQuantity=[];//$panierQuantity['id_ligne_ticket']="Quantity";
foreach ($lignesTicket as $row) {

  $panierProduct[$row['id_ligne_ticket']]=$row['id_product'];

  $cookie_name= (string) $row['id_ligne_ticket']; 

  //Creer des cookies id_ligne_ticket => Quantity 
    if(isset($_COOKIE[$cookie_name]) ){
      $cookie_value=(string) $_COOKIE[$cookie_name];
    } else {
      $cookie_value=(string) $row['quantity']; 
    }        
  setcookie($cookie_name,$cookie_value, time() + (86400 * 30), "/");

  $panierQuantity[(int) $cookie_name]=(string) $cookie_value;
}

$countItems=count($panierProduct);   
setcookie("countItems","", time() - 3600);
setcookie("countItems",$countItems,time() + (86400 * 30),'/');  

$prd=array_values($panierProduct);

$prdPanier=implode(",",$prd);
 
//liste des produits se trouvant dans la tables lignes_ticket
$sqlstm = $pdo -> prepare('SELECT * FROM products 
                           INNER JOIN categories 
                           ON products.id_category = categories.id_category
                           WHERE id_product IN (' . $prdPanier . ') ');
$sqlstm -> execute();
$prdPanier = $sqlstm -> fetchAll(PDO::FETCH_ASSOC);

?>  

<?php
ob_start();
?>

<div class="container py-2">
                 
    <div class="row">      
      <?php
      if(empty($prdPanier)){
      ?>
      <div class='alert alert-warning' role='alert'>
          Le ticket est vide !
      </div>
      <?php       
      }else{
      ?>        
        <!-- table items of the ticket edited --->
        <table class="table table-striped table-hover">
          <thead>
            <tr><!-- table row--->
              <th width="10%">Id</th><!-- table head--->       
              <th width="10%">Category</th><!-- table head--->       
              <th width="20%">imgSrc</th>          
              <th width="20%">Product</th>          
              <th width="10%" style="text-align:center;">Quantite</th> 
              <th width="10%">Prix</th> 
              <th width="20%">Total</th>                             
            </tr>
          </thead>
          <tbody>
            <?php   
              $i=0;
              $totalTicket=0;        
              foreach ($prdPanier as $produit){                  
                $idLigneTicket=array_search($produit['id_product'],$panierProduct);                
                $idProduct=$produit['id_product'];
                $idCategory=$produit['id_category'];
                $idLigneTicket=array_search($produit['id_product'],$panierProduct);
                $quantityItem=$panierQuantity[$idLigneTicket];                
                $totalItem=$produit['price']*$quantityItem;
                $totalTicket+=$totalItem;
                
                $ligneTicketEdited[$i]['id_ligne_ticket']=$idLigneTicket;
                $ligneTicketEdited[$i]['quantity']=$quantityItem;
                $ligneTicketEdited[$i]['total_ligne']=$totalItem;
                $i++;
            ?>              
            <tr>
                <td><?=$idProduct?></td>

                <td><?=$produit['name_category']?></td>
    
                <td>            
                <img class="img img-fluid" src="/uploads/products/<?=$produit['imgSrc']?>" width="70px" alt="">
                </td>           
    
                <td><?=$produit['name_product']?></td>                
                          
                <td><!---Quantity---------------->                    
                  <!---Quantity--->
                  <?php include 'quantity.php'?>
                  <!---Quantity--->
                </td><!---Quantity Quantity---------------->            
                                
                <td class="tdPrice"><?=$produit['price']?></td>
    
                <td class="tdtotalItem"><strong><?=$totalItem?></strong></td>
    
            </tr>  
            <?php     
                }                             
            ?>          
          </tbody> 
          <tfoot>
            <tr>
              <th colspan="6" style="text-align:right;" ><strong>Total</strong></th>
              <th id="thtotalTicket"><strong><?=$totalTicket?></strong></th>
            </tr>    
            <tr>
              <th colspan="6" style="text-align:right;" >
                <form action="" method="post">                  
                <div class="d-flex mb-3 justify-content-end">                    
                    <a href="index.php" class="btn btn-primary mx-1">Annuler</a>
                    <input type="submit" name="valider" class="btn btn-success mx-1" value="Valider">
                    <input type="submit" name="vider"   class="btn btn-danger" value="Vider" onclick="return confirm('Confirmer vider panier?')">                                      

                  </div>
                </form>            
              </th>          
            </tr>    
          </tfoot> 
    
        </table>                                            
      <?php
      }
      ?>  
                                           
    </div><!---row--->

</div><!-----container py-2 --->    
 
<?php $content = ob_get_clean(); ?>

<?php
   if(isset($_POST['valider']))
   {
    
    
    require_once 'C:/caisse191124/include/database.php';
    
    //Update table lignes_ticket
    $sqlValue="";    
    foreach ($ligneTicketEdited as $row) {

       $sqlValue.="UPDATE lignes_ticket
                   SET    quantity = ".$row['quantity'].",
                          total_ligne = ".$row['total_ligne']." 
                   WHERE  id_ligne_ticket=".$row['id_ligne_ticket'].";";   
    }

    // echo $sqlValue;
    $sqlstm = $pdo -> prepare($sqlValue);

    $sqlstm->execute();

    //Update table tickets
    $sqlValue.="UPDATE tickets
                SET    total_ticket = ?                           
                WHERE  id_ticket = ?"; 

    $sqlstm = $pdo -> prepare($sqlValue);  

    $sqlstm->execute([$totalTicket,$id]);

    header('location:index.php');
            
   }//valider
       
?>


<?php $role=1; //$role= array(0 => Visitor, 1 => Admin, 2 => Seller)?>
<?php $varSell="Tickets";$varData="Data";?>
<?php include "c:/caisse191124/layout.php" ?>


<?php
// echo "====itemsTicket==============================";
// echo "<pre>";
// var_dump($panier);
// echo "</pre>";
?>