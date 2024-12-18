<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="/asset/css/style.css">
    <title><?=$title?></title>
</head>
<body>      
      <div class="container py-2">
        <?php
          /* $role= array( 0 => "Visitor",
                           1 => "Client",
                           2 => "Seller",
                           3 => "Admin"); */
        ?>
        <?php include "C:/caisse191124/front/category/count_items.php"?> 

        <?php 

            $role=0;
            session_start();
            if(isset($_SESSION['user'])){
              $role=$_SESSION['user']['role'];
            }
            switch ($role) {
              case 0:
                include 'include\nav.php'; 
                break;
              case 1:
                include 'include\nav.php'; 
                break;
              case 2:
                include 'include\nav.php'; 
                break;
              case 3:
                include 'include\navAdmin.php';
                break;            
              default:
                //code block
            } ;//fin block switch              
        ?>
        

        <?=$content?>

      </div> 
      <script src="/asset/js/script.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>     
</body>
</html>