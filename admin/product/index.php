<?php
$title ="List of products";
ob_start();
?>

<div class="container py-2">

    <a href="addProduct.php" class="btn btn-primary">Ajouter Produit</a>

    <table class="table table-striped table-hover">

    <thead>
        <tr><!-- table row--->
        <th width="10%">Id</th><!-- table head--->
        <th width="10%">Category</th>
        <th width="10%">Product</th>
        <th width="10%">description</th>
        <th width="10%">price</th>       
        <th width="10%">imgSrc</th>
        <th width="10%">Date</th>
        <th width="10%">Action</th>
        </tr>
    </thead>

    <tbody>

            <?php 

                require_once 'C:/caisse191124/include/database.php';

                $sql ="SELECT * FROM products
                       INNER JOIN categories 
                       ON products.id_category = categories.id_category;";

                $sqlPdo = $pdo -> query($sql)      
                -> fetchAll(PDO::FETCH_ASSOC); 

                foreach ($sqlPdo as $row) {  
            ?>  

            <tr>
            <td><?=$row['id_product']?></td>
            <td><?=$row['name_category']?></td>
            <td><?=$row['name_product']?></td>
            <td><?=$row['description']?></td>
            <td><?=$row['price']?></td>
            <td>            
                <img class="img img-fluid" src="/uploads/products/<?=$row['imgSrc']?>" width="70px" alt="">
            </td>
            <td><?= date_format(date_create($row['date_product']),format:'d/m/y' )?></td>
            <td>
                <div class="d-flex py-2">
                <a href="modif.php?id=<?=$row['id_product'] ?>" class="btn btn-primary btn-sm mx-1">Modifier</a>
                <a href="suprim.php?id=<?=$row['id_product']?>" class="btn btn-danger btn-sm"
                onclick="return confirm('Confirmez la suppression de<?=$row['name_product']?>?')">Suprimer</a>          
                </div>
            </td>
            </tr>  
            <?php     
                }                             
            ?>          

    </tbody> 

    </table>

</div>

 

<?php $content = ob_get_clean(); ?>

<?php $role=1; //$role= array(0 => Visitor, 1 => Admin, 2 => Seller)?>
<?php $varSell="Sell";$varData="Data";?>
<?php include "c:/caisse191124/layout.php" ?>





