<?php
$title ="Add Category";
ob_start();
?>

    <div class="container py-2">

    <?php
         
         if(isset($_POST['addCategory'])){
         
          $name_category=$_POST['name_category'];
         
          if(!empty($name_category)){

            require_once 'C:/caisse191124/include/database.php';
           
            $sql = "INSERT INTO categories (name_category)
                    VALUES (?)";

            $sqlPdo = $pdo -> prepare($sql);
             
            $sqlPdo -> execute([$name_category]);  
             
             //Redirection
             header('location:index.php');

          } else {
             echo "
                    <div class='alert alert-danger' role='alert'>
                      Le nom de la categorie est obligatoire !
                    </div>
                  ";
          }          

         }
?>      

      <form method="post">

        <label class="form-label">Category :  </label>
        <input type="text" class="form-control" name="name_category">

        <input type="submit" value="Ajouter" class="btn btn-primary my-2" name="addCategory">

      </form>

    </div>

<?php $content = ob_get_clean(); ?>

<?php $role=1; //$role= array(0 => Visitor, 1 => Admin, 2 => Seller)?>
<?php $varSell="Sell";$varData="Data";?>
<?php include "c:/caisse191124/layout.php" ?>