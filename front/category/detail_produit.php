<?php include "count_items.php"?>

<?php
var_dump($panier);
echo "<br>";
var_dump($_GET)
?>

<?php
require_once 'C:/caisse191124/include/database.php';

$idProduct = $_GET['idPrd'];

$sqlstm = $pdo -> prepare('SELECT * FROM products
                           WHERE id_product=?');
$sqlstm -> execute([$idProduct]); 
$produit= $sqlstm -> fetch(PDO::FETCH_ASSOC);

$discount=$produit['discount'];
$prix =$produit['price'];
$total = $prix-$prix*$discount/100;

$idProduct=$produit['id_product'];
$idCategory=$produit['id_category'];
$quantityItem=$panier[$idProduct];
?>

<?php
$title ="Detail Produit";
ob_start();
?>

<div class="container py-2">
      <div class="container">
        <div class="row">

          <div class="col-md-6">
            <h4><?=$produit['name_product']?></h4>
            <img class="img img-fluid w-50"src="/uploads/products/<?=$produit['imgSrc']?>" alt="">
          </div>

          <div class="col-md-6">

              <div class="d-flex align-items-center">

                <h4 class="w-100">
                  <?=$produit['name_product']?>
                </h4>

                <h5 class="mx-1">
                <span class="badge bg-success">
                 -<?=$produit['discount']?>%
                </span>                   
                </h5>   

              </div>  

              <hr>

              <p><?=$produit['description']?></p>

              <hr>

              <div class="d-flex">

                <h3 class="mx-1">
                  <span class="badge bg-danger">
                  <del><?=$prix?></del> MAD
                  </span>                   
                </h3>         

                <h2 class="mx-1">
                  <span class="badge bg-success">
                  <?=$total?> MAD
                  </span>                   
                </h2>         

              </div>            
            <hr>                                
                <!---Quantity--->
                <?php include "quantity.php";        ?>
                <!---/Quantity--->                                 
            <hr>
          </div>  

        </div>
      </div>
    </div>
 

<?php $content = ob_get_clean(); ?>

<?php $role=0;//$role= array(0 => Visitor, 1 => Admin, 2 => Seller)?>
<?php $varSell="Sell";$varData="Data";?>
<?php require_once 'C:\caisse191124\layout.php'?>