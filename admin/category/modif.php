<?php
$title ="Modif Category";
ob_start();
?>
    <div class="container py-2">

    <?php 


    if(isset($_POST['back'])){
    //Redirection
    header('location:index.php');
    }

    
     require_once 'C:/caisse191124/include/database.php';

     $id = $_GET['id'];
     $sqlstm = $pdo -> prepare('SELECT * FROM categories
                                WHERE id_category=?');
     
     $sqlstm -> execute([$id]) ;

     $category=$sqlstm->fetch(PDO::FETCH_ASSOC);

     if(isset($_POST['modifCategory'])){
        $name_category =$_POST['name_category'] ;
       
        if(!empty($name_category)){
        $sqlstm = $pdo -> prepare('UPDATE categories
                                   SET name_category=?                                               
                                   WHERE id_category=?                                   ');

        $sqlstm -> execute([$name_category,$id]) ;

        //Redirection
        header('location:index.php');

       } else {
        echo "
        <div class='alert alert-danger' role='alert'>
          Le nom de la categorie est obligatoire !
        </div>";      
       }
     }

    ?>



  <form method="post">

    <label class="form-label fw-bolder"> Category: </label>
    <input type="text" class="form-control" name="name_category" value="<?=$category['name_category']?>">
    

    <input type="submit" value="Modif Category" class="btn btn-primary my-2" name="modifCategory">
    <input type="submit" value="Back" class="btn btn-danger my-2" name="back">

  </form>

</div>


<?php $content = ob_get_clean(); ?>

<?php $role=1; //$role= array(0 => Visitor, 1 => Admin, 2 => Seller)?>
<?php $varSell="Sell";$varData="Data";?>
<?php include "c:/caisse191124/layout.php" ?>