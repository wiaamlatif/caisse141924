<?php $title ="Etat Z"; ?>

<?php ob_start();?>

<div class="container py-2">   
  
    <div class="d-flex py-2">
      <a href="addEtatz.php" class="btn btn-danger"       >Z</a>          
      <a href="addEtatz.php" class="btn btn-primary  mx-1">X</a>
    </div>

    <div class="row">
          
        <table class="table table-striped table-hover">
          <thead>
            <tr><!-- table row--->
              <th width="10%">Nr Z</th>
              <th width="10%">Date</th>
              <th width="10%">Nr Ticket Debut</th>          
              <th width="10%">Nr Ticket Fin</th>          
              <th width="10%">Total</th>                
              <th width="10%" style="text-align: center;">Action</th>                           
            </tr>
          </thead>
          <tbody>
          <?php 
              require_once 'C:/caisse191124/include/database.php';

              $sql = "SELECT * FROM etat_z ;";       
              $listeEtatZ = $pdo -> query($sql)
                                 -> fetchAll(PDO::FETCH_ASSOC);

                     $totalEtatZ=0;
                     foreach ($listeEtatZ as $EtatZ){                 
                     $totalEtatZ+=$EtatZ['total_z'];
          ?>              
            <tr>
                <td><?=$EtatZ['id_z']?></td>            
                <td><?=$EtatZ['date_z']?></td>                
                <td><?=$EtatZ['nr_tk_debut']?></td>
                <td><?=$EtatZ['nr_tk_fin']?></td>
                <td><?=$EtatZ['total_z']?></td>               
                <td>
                  <div class="d-flex py-2">                    
                    <a href="modif.php?id=<?=$row['id_product'] ?>" class="btn btn-danger btn-sm mx-1">Detail</a>
                    <a href="modif.php?id=<?=$row['id_product'] ?>" class="btn btn-primary btn-sm mx-1">Category</a>
                    <a href="modif.php?id=<?=$row['id_product'] ?>" class="btn btn-info btn-sm mx-1">Items</a>
                    <a href="suprim.php?id=<?=$row['id_product']?>" class="btn btn-warning btn-sm"
                       onclick="return confirm('Confirmez la suppression de<?=$row['name_product']?>?')">Sellers</a>          
                  </div>
                </td>    
            </tr>  
          <?php     
              }                             
          ?>          
          </tbody> 
          <tfoot>
            <tr>
              <th colspan="4" style="text-align:right;" ><strong>Total</strong></th>
              <th id="thtotalTicket"><strong><?=$totalEtatZ?></strong></th>
            </tr>                
          </tfoot> 
    
        </table>        
                                           
    </div><!---row--->

</div><!-----container py-2 --->

<?php $content = ob_get_clean(); ?>


<?php $role=0;//$role= array(0 => Visitor, 1 => Admin, 2 => Seller)?>
<?php $varSell="Etat_XZ";$varData="Data";?>
<?php require_once 'C:\caisse191124\layout.php'; ?>  

<?php   
 /* echo "counItems :".$countItems;
    echo "<pre>";
    var_dump($panier);
    echo "</pre>";*/
  //onclick="return confirm('Authentification obligatoire')"
?>   

