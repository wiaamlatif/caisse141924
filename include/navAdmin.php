<?php
      define("MAINDIRECTORY","caisse1924"); 

      $urlHost = "http://localhost:8000";

      $textNav = array(
                        0 => "Dashboard",
                        1 => "Categories",
                        2 => "Products",
                        3 => "Sells",
                        4 => "Commandes",
                        5 => "Livraisons",
                        6 => "Tickets",
                        7 => "X/Z",
                        8 => "Users",
                        9 => "Employes",
                       10 => "Clients",
                       11 => "Fournisseurs",
                       12 => "Deconnexion"
      );

      $urlNav = array(
                       0 => "/admin/index.php",
                       1 => "/admin/category/index.php",
                       2 => "/admin/product/index.php",
                       3 => "/admin/sell/index.php",
                       4 => "/admin/sell/commande/index.php",
                       5 => "/admin/sell/livraison/index.php",
                       6 => "/admin/sell/ticket/index.php",
                       7 => "/admin/sell/x_z/index.php",                       
                       8 => "/admin/data/index.php",
                       9 => "/admin/data/user/index.php",
                      10 => "/admin/data/employe/index.php",
                      11 => "/admin/data/client/index.php",
                      12 => "/admin/data/fournisseur/index.php",
                      13 => "/include/deconnexion.php",
                      14 => "/admin/category/addCategory.php",
                      15 => "/admin/category/modif.php",
                      16 => "/admin/product/addProduct.php",                      
                      17 => "/admin/product/modif.php",
                      18 => "/admin/sell/ticket/edit.php",
                      19 => "/admin/sell/ticket/print.php",
                      20 => "/admin/sell/ticket/suprim.php",                                            
      ); 

      for ($i=0; $i < count($urlNav) ; $i++) { 
        $coloredNav[$i]="";
      }
      
      //echo $_SERVER['PHP_SELF'];

      $clickedNav=array_search($_SERVER['PHP_SELF'],$urlNav);

      if(in_array($clickedNav,range(14,15))){$clickedNav=1;}
      if(in_array($clickedNav,range(16,17))){$clickedNav=2;}

      if(in_array($clickedNav,range(18,20))){$clickedNav=6;}
      
      $sellColored=(in_array($clickedNav,range(3,7)) ? "bg-primary text-white active" :"");

      $dataColored=(in_array($clickedNav,range(8,12)) ? "bg-primary text-white active" :"");

      $coloredNav[$clickedNav]= "bg-primary text-white active";
            
      $countItems=0;      
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">

  <div class="container-fluid">
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">

            <li class="nav-item">
                <a class="nav-link <?=$coloredNav[0]?>" href="<?=$urlHost.$urlNav[0]?>">Dashboard</a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?=$coloredNav[1]?>" href="<?=$urlHost.$urlNav[1]?>">Categories</a>
            </li>

            <li class="nav-item">
            <a class="nav-link <?=$coloredNav[2]?>"     href="<?=$urlHost.$urlNav[2]?>">Products</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link 
                <?php
                      if($clickedNav===3){
                ?>
                         <?="dropdown-toggle"?>
                <?php
                      }
                ?>
                <?=$sellColored?>" href="<?=$urlHost.$urlNav[3]?>" 
                <?php
                      if($clickedNav===3){                      
                ?>
                      data-bs-toggle="dropdown"        
                <?php
                      } 
                ?>                
                > <!---Fermeture tag a --->
                    <?=$varSell?>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item <?=$coloredNav[4]?>" href="<?=$urlHost.$urlNav[4]?>">Commandes</a></li>
                    <li><a class="dropdown-item <?=$coloredNav[5]?>" href="<?=$urlHost.$urlNav[5]?>">Livraisons</a></li>
                    <li><a class="dropdown-item <?=$coloredNav[6]?>" href="<?=$urlHost.$urlNav[6]?>">Tickets</a></li>
                    <li><a class="dropdown-item <?=$coloredNav[7]?>" href="<?=$urlHost.$urlNav[7]?>">X/Z</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link 
                <?php
                      if($clickedNav===8){
                ?>
                         <?="dropdown-toggle"?>
                <?php
                      }
                ?>
                <?=$dataColored?>" href="<?=$urlHost.$urlNav[8]?>" 
                <?php
                      if($clickedNav===8){                      
                ?>
                      data-bs-toggle="dropdown"        
                <?php
                      } 
                ?>                
                > <!---Fermeture--->
                    <?=$varData?>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item <?=$coloredNav[9]?>" href="<?=$urlHost.$urlNav[9]?>">Users</a></li>
                    <li><a class="dropdown-item <?=$coloredNav[10]?>" href="<?=$urlHost.$urlNav[10]?>">Employes</a></li>
                    <li><a class="dropdown-item <?=$coloredNav[11]?>" href="<?=$urlHost.$urlNav[11]?>">Clients</a></li>
                    <li><a class="dropdown-item <?=$coloredNav[12]?>" href="<?=$urlHost.$urlNav[12]?>">Fournisseurs</a></li>
                </ul>
            </li>

            <li class="nav-item">
            <a class="nav-link <?=$coloredNav[13]?>"     href="http://localhost:8000/include/deconnexion.php">Deconnexion</a>
            </li>

      </ul>      
      </div>

      <?php if(isset($_SESSION)){ ?>
        <h3><span class="badge text-bg-success text-white">
              <?=$_SESSION['user']['login'];?>
        </span></h3>
      <?php } ?>      

      <a class="btn"  href="panier.php"><i class="fa-solid fa-cart-shopping mx-2"></i>Panier(<?=$countItems?>)</a>
  </div>
</nav>