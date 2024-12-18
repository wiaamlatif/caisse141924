<?php

  echo lastNrTicket();

  function lastNrTicket()
  {
    require_once 'C:/caisse191124/include/database.php';

    $sql = 'SELECT * FROM tickets
            ORDER BY id_ticket DESC LIMIT 1';

    $sqlstm = $pdo -> prepare($sql);
    $sqlstm -> execute();
    
    $listTickets = $sqlstm -> fetch(PDO::FETCH_ASSOC);

    return $listTickets[0]['nr_ticket'];
  }

?>

<h1>Test coco</h1>