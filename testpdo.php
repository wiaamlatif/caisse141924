<?php

    $id=7;
    require_once 'C:/caisse191124/include/database.php';

    $sql = "SELECT * FROM lignes_ticket
            WHERE id_ticket=?";
            

    $sqlstm = $pdo -> prepare($sql);
    $sqlstm -> execute([$id]);    
    $lignesTicket = $sqlstm -> fetchAll(PDO::FETCH_ASSOC);

    echo "<pre>";
    var_dump($lignesTicket);
    echo "</pre>";
?>

