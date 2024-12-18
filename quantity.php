<?php //http://localhost:8000/front/category/quantity.php ?>
<?php
$title ="Quantity";
ob_start();
?>
    <h1>Quantity</h1>
    <?php
       $idProduct=12;
       $quantityItem=$_COOKIE['12'];
    ?>

    <div class="container py-2">
        <div class="row">

            <div class="d-flex mb-3 justify-content-center"> 

                <button onclick="return false" type="submit" class="supItemCart btn btn-danger btn-sm">
                        <i class="fa-solid fa-trash-can"></i>
                </button>
                                            
                <button class="qtyMinus btn btn-primary btn-sm mx-2" onclick="return false">
                    <strong>-</strong>
                </button>  

                <input  class="idProduct" type="hidden" value="<?=$idProduct?>">

                <input  class="qtyInput" type="text" value="<?=$quantityItem?>" readonly>    

                <button class="qtyPlus btn btn-primary btn-sm mx-2" onclick="return false">
                    <strong>+</strong>
                </button>  

            </div>
            
        </div>
    </div>


 

<?php $content = ob_get_clean(); ?>

<?php $role=0;//$role= array(0 => Visitor, 1 => Admin, 2 => Seller)?>
<?php $varSell="Sell";$varData="Data";?>
<?php require_once 'C:\caisse191124\layout.php'; ?>  