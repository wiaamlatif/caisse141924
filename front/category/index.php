<?php $title ="Liste des categories"; ?>

<?php
    require_once 'C:/caisse191124/include/database.php';

    $sql='SELECT * FROM categories';
    $sqlPdo = $pdo -> query($sql);                              
    $sqlPdo -> execute(); 
    $categories= $sqlPdo -> fetchAll(PDO::FETCH_ASSOC);      
?>
<?php ob_start();?>

   <ul class="list-group list-group-flush w-25">
      <?php           
         foreach ($categories as $row) {  
      ?>              
      <li class="list-group-item">
         <a class="btn btn-light" href="categorie.php?id=<?=$row['id_category']?>"><?=$row['name_category']?></a>
      </li>
      <?php     
            }                             
      ?>          
   </ul>

<?php $content = ob_get_clean(); ?>

<?php $role=0;//$role= array(0 => Visitor, 1 => Admin, 2 => Seller)?>
<?php $varSell="Sell";$varData="Data";?>
<?php require_once 'C:\caisse191124\layout.php'?>





