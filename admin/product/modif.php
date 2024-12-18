<?php
$title ="Modif product";
ob_start();
?>
   <?php
    if(isset($_POST['back'])){
      //Redirection
      header('location:index.php');
    }
?>

   <div class="container py-2">
   <?php 
     
     require_once 'C:/caisse191124/include/database.php';
     
     $id = $_GET['id'];          
     $sqlstm = $pdo -> prepare('SELECT * FROM products
                                INNER JOIN categories
                                ON products.id_category = categories.id_category
                                WHERE products.id_product  =?;   
                              ');
     
     $sqlstm -> execute([$id]) ;

     $produit=$sqlstm->fetch(PDO::FETCH_ASSOC);
    
     if(isset($_POST['modifProduct'])){
        $name_product = $_POST['name_product'];
         $id_category = $_POST['id_category'];
         $description = $_POST['description'];
               $price = $_POST['price'];
            $discount = $_POST['discount']; 
         
        if(empty($_FILES['imgSrc']['name'])){
          $myImage=$produit['imgSrc'];
          } else {
            $myImage=uniqid().$_FILES['imgSrc']['name'];           
            move_uploaded_file($_FILES['imgSrc']['tmp_name'],'C:/caisse191124/uploads/products/'.$myImage);
          }
           
        if(!empty($name_product)){
        $sqlstm = $pdo -> prepare('UPDATE products
                                   SET   name_product=?,
                                          id_category=?,
                                          description=?,
                                          price=?,
                                          discount=?,
                                          imgSrc=?
                                   WHERE id_product=?
                                   ');

        $sqlstm -> execute([$name_product,$id_category,$description,$price,$discount,$myImage,$id]) ;

        //Redirection
        header('location:index.php');

       } else {
        echo "
        <div class='alert alert-danger' role='alert'>
          Le nom du produit est obligatoire !
        </div>";      
       }
     }

    ?>

      <form method="post" enctype="multipart/form-data">

        <label class="form-label">Name product</label>
        <input type="text" class="form-control" name="name_product" value="<?=$produit['name_product']?>">

        <label class="form-label" >Category:</label>
        <select class="form-control" name="id_category" id="id_category">
            <option value="<?=$produit['id_category']?>"><?=$produit['name_category']?></option>
          <?php 
              $sqlstm = $pdo -> query('SELECT * FROM categories')      
              -> fetchAll(PDO::FETCH_ASSOC);      
              foreach ($sqlstm as $row) {  
          ?>              
            <option value='<?=$row['id_category']?>'><?=$row['name_category']?></option>;
          <?php     
              }                             
          ?>          
        </select>

        <label class="form-label">Description</label>
        <input type="text" class="form-control" name="description" value="<?=$produit['description']?>">

        <label class="form-label">Price</label>
        <input type="text" class="form-control" name="price" value="<?=$produit['price']?>">

        <label class="form-label">Discount</label>
        <input type="number" class="form-control" name="discount" min="0" max="100" value="<?=$produit['discount']?>">

        <label class="form-label">Image</label>
        <input type="file" class="form-control" name="imgSrc">
        <img class="img img-fluid" src="../uploads/products/<?=$produit['imgSrc'] ?>" width="100px" alt="">

        <input type="submit" value="Modif Produit" class="btn btn-primary my-2" name="modifProduct">
        <input type="submit" value="Back" class="btn btn-danger my-2" name="back">

      </form>

    </div>
    
 

<?php $content = ob_get_clean(); ?>

<?php $role=0;//$role= array(0 => Visitor, 1 => Admin, 2 => Seller)?>

<?php $varSell="Sell";$varData="Data";?>
<?php include "c:/caisse191124/layout.php" ?>