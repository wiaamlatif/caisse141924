<?php
  //id_z	nr_z	nr_tk_debut	nr_tk_fin	total_z	date_z
  
  require_once 'C:/caisse191124/include/database.php';
       
    //nr_tk_debut=============================
    $sql = "SELECT * FROM tickets
            WHERE `validated`=0          
            LIMIT 1 ;";

    $sqlPdo = $pdo -> query($sql)
                    -> fetch(PDO::FETCH_ASSOC);
    
   
    $nr_tk_debut = $sqlPdo['nr_ticket']; 

    //nr_tk_fin=================================
    $sql = "SELECT  * FROM `tickets`
            WHERE `validated`=0
            ORDER BY `id_ticket` DESC
            LIMIT 1;";

    $sqlPdo = $pdo -> query($sql)
    -> fetch(PDO::FETCH_ASSOC);

    $nr_tk_fin=$sqlPdo['nr_ticket'];

    //total_z ===================================
    $sql ="SELECT sum(`total_ticket`) FROM `tickets`
           WHERE `validated`=0;";

    $sqlPdo = $pdo -> query($sql)
    -> fetch(PDO::FETCH_ASSOC);

    $total_z = $sqlPdo['sum(`total_ticket`)']; 
    
    
    $sql="INSERT INTO etat_z  (nr_tk_debut,
                                 nr_tk_fin,
                                   total_z)        
          VALUES (?,?,?)";

$sqlstm = $pdo -> prepare($sql);

$sqlstm -> execute([$nr_tk_debut,$nr_tk_fin,$total_z]);

 //Update table tickets (id_z and validate) ===================================

 $id_z= $pdo->lastInsertId();
 $validated=1;

 $sql = "UPDATE tickets
         SET    id_z =?,
                validated=?                                          
          WHERE validated=0
        ";
      
$sqlstm = $pdo -> prepare($sql);

$sqlstm -> execute([$id_z,$validated]) ;

 
header('location:index.php');


// etat_z 
//$nr_z=27;
//$nr_tk_debut=55;
//$nr_tk_fin=77;
//$total_z=120;
//$datez
//echo "       nr_z :".$nr_z; 
//echo " nr_tk_debut:".$nr_tk_debut;
//echo "   nr_tk_fin:".$nr_tk_fin;
//echo "    total_z :".$total_z;