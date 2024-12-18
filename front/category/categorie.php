<?php include "count_items.php"?>

<?php
    $idCategory = $_GET['id']; 
    require_once 'C:/caisse191124/include/database.php';

    $sqlstm = $pdo -> prepare('SELECT * FROM categories
                               WHERE id_category=?');
    $sqlstm -> execute([$idCategory]); 
    $categorie= $sqlstm -> fetch(PDO::FETCH_ASSOC);  

   
    $sqlstm = $pdo -> prepare('SELECT * FROM products
                               WHERE id_category=?');
    $sqlstm -> execute([$idCategory]); 
    $produits= $sqlstm -> fetchAll(PDO::FETCH_ASSOC);
?>

<?php 
       $title=$categorie['name_category']; 
?>

<?php ob_start();?>

    <h3><?=$title?></h3>    

    <div class="container">
        <div class="row">

            <?php 
              foreach ($produits as $produit) {
                $idCategory=$produit['id_category'];
                $idProduct=$produit['id_product'];
                if(in_array($produit['id_product'],array_keys($panier))){
                    $quantityItem=$panier[$produit['id_product']];
                } else {
                    $quantityItem=0;
                }
            ?>
            <!--==============================--->
            <div class="card mb-3 col-md-3 m-1">
                <img src="/uploads/products/<?=$produit['imgSrc']?>" class="card-img-top w-50 mx-auto" alt="...">
                <div class="card-body">
                    <a href="detail_produit.php?idPrd=<?=$idProduct?>" class="btn stretched-link">Afficher detail</a>
                    <h5 class="card-title"><?=$produit['name_product']?></h5>
                    <p class="card-text"><?=$produit['description']?></p>
                    <p class="card-text"><small class="text-muted"> <?=$produit['price']?> MAD</small></p>
                    <p class="card-text"> <?= date_format(date_create($produit['date_product']),format:'Y/m/d' )  ?></p>
                </div>
                <div class="card-footer" style="z-index:10">                 
                    <!---Quantity--->
                    <?php include "quantity.php";        ?>
                    <!---/Quantity--->
                </div>
            </div>            
            <!--==============================--->
            <?php
              }
            ?>
     

        </div>
    </div>
    
<?php $content = ob_get_clean(); ?>

<?php $role=0;//$role= array(0 => Visitor, 1 => Admin, 2 => Seller)?>
<?php $varSell="Sell";$varData="Data";?>
<?php require_once 'C:\caisse191124\layout.php'?>











<?php echo $_GET['id'];?>