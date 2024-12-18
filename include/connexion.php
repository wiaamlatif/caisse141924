<?php
//Dans connexion.php => role 
$roleDef= array(0 =>"Visitor", 1 => "Client", 2 => "Seller", 3 => "Admin");
$title ="Connexion";
ob_start();
?>
    <?php
       if(isset($_POST['connexion'])){

        $login=$_POST['login'];
          $pwd=$_POST['password'];

         if(!empty($login) && !empty($pwd)){

            require_once '../include/database.php';

            $sql = "SELECT * FROM users
                    WHERE login = ?
                    and password = ?";

            $sqlPdo = $pdo -> prepare($sql);

            $sqlPdo -> execute([$login,$pwd]);

            $user=$sqlPdo -> fetch(PDO::FETCH_ASSOC);
           
            $find=$sqlPdo -> rowCount()>0;

            if($find){                
                        session_start();
                        $_SESSION['user'] = $user;  
                                                                                      
                        header('location:../admin/index.php');

                     } else {
    ?>
            <div class="alert alert-danger text-center text-success" id="alert" role="alert">
                Login ou mot de passe incorrects !
            </div>

                         
    <?php

                     }            
         } else {
    ?>
            <div class="alert alert-danger text-center text-success" id="alert" role="alert">
                Login et mot de passe sont obligatoires!
            </div>
    <?php        
         }
       }
    ?>
    <form method="post">
        <div class="container">
            <label class="form-label">Login</label>
            <input type="text" name="login" class="form-control">

            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control">

            <input type="submit" name="connexion" value="Connexion" class="btn btn-primary my-2">
        </div>
    </form>    


<?php $content = ob_get_clean(); ?>

<?php 
      $role=0;
      if(isset($_SESSION['user'])){
        $role=$_SESSION['user']['role'];
      }
?>
<?php $varSell="Sell";$varData="Data";?>
<?php require_once 'C:\caisse191124\layout.php'?>

