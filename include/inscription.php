<?php
$title ="Inscription";
ob_start();
?>
     <div class="container justify-content-center py-2 w-75">
     <?php
        if(isset($_POST['inscrire'])){
            $login=$_POST['login'];
            $pwd=$_POST['password'];
            $role=2;
            if(!empty($login) && !empty($pwd)){

                require_once '../include/database.php';

                $sql = "INSERT INTO users (login,password,role) 
                        VALUES (?,?,?)";

                $sqlPdo = $pdo -> prepare($sql);
               
                $sqlPdo -> execute([$login,$pwd,$role]);

                //Redirection
                header('location:../include/connexion.php');
               
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
       
            <label class="form-label">Login</label>
            <input type="text" name="login" class="form-control">

            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control">

            <input type="submit" name="inscrire" value="Inscrire" class="btn btn-primary my-2">
        
    </form>    

    </div>

<?php $content = ob_get_clean(); ?>

<?php $role=0;//$role= array(0 => Visitor, 1 => Admin, 2 => Seller)?>
<?php $varSell="Sell";$varData="Data";?>
<?php require_once 'C:\caisse191124\layout.php'?>