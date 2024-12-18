<?php
$connected=false;
  if(isset($_SESSION['user'])){
     $connected=true;
  } 
?>

<?php
 // echo $_SERVER['PHP_SELF'];

  $urlHost = "http://localhost:8000";

  $textNav = array(
                    0 => "Home",
                    1 => "Category",
                    2 => "Product",
                    3 => "Inscription",
                    4 => "Connexion",
                    5 => "Deconnexion"
  );

  $urlNav = array(
                   0 => "/index.php",
                   1 => "/front/category/index.php",
                   2 => "/front/product/index.php",
                   3 => "/include/inscription.php",
                   4 => "/include/connexion.php",
                   5 => "/include/deconnexion.php",
                   6 => "/front/category/panier.php",
                   7 => "",                       
  );

  for ($i=0; $i < count($urlNav) ; $i++) { 
    $coloredNav[$i]="";
  }
  
  $clickedNav=array_search($_SERVER['PHP_SELF'],$urlNav);

  $coloredNav[$clickedNav]= "bg-primary text-white active";

?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">

      <ul class="navbar-nav">

        <li class="nav-item">
          <a class="nav-link <?=$coloredNav[0]?>" href="/index.php">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?=$coloredNav[1]?>" href="/front/category/index.php">Category</a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?=$coloredNav[2]?>" href="/front/product/index.php">Product</a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?=$coloredNav[3]?>" href="/include/inscription.php">Inscription</a>
        </li>
        <?php if(!$connected) { ?>       
        <li class="nav-item">
          <a class="nav-link <?=$coloredNav[4]?>" href="/include/connexion.php">Connexion</a>
        </li>
        <?php   } else {       ?>       
        <li class="nav-item">
          <a class="nav-link <?=$coloredNav[5]?>" href="/include/deconnexion.php">Deconnexion</a>
        </li>
        <?php   }       ?>       
      </ul>

      <?php if(isset($_SESSION)){ ?>
        <h3><span class="badge text-bg-success text-white">
              <?=$_SESSION['user']['login'];?>
        </span></h3>
      <?php } ?>      

      <a class="btn <?=$coloredNav[6]?>"  href="http://localhost:8000/front/category/panier.php"><i class="fa-solid fa-cart-shopping mx-2"></i>Panier(<?=$countItems?>)</a>

  </div>
  
</nav>