<?php
 require_once 'C:/caisse191124/include/database.php';

 $sql ="UPDATE lignes_ticket
        SET    quantity=:quantity1,
               total_ligne=:total_ligne1
        WHERE  id_ligne_ticket=:id_ligne_ticket1";

       $sqlstm = $pdo -> prepare($sql);

       $A=77;
       $B=144;
       $C=36;
       $sqlstm->bindParam(':quantity1',$A);
       $sqlstm->bindParam(':total_ligne1',$B);
       $sqlstm->bindParam(':id_ligne_ticket1',$C);

       $sql ="UPDATE lignes_ticket
       SET    quantity=:quantity2,
              total_ligne=:total_ligne2
       WHERE  id_ligne_ticket=:id_ligne_ticket2";

      $sqlstm = $pdo -> prepare($sql);

      $A=77;
      $B=144;
      $C=37;
      $sqlstm->bindParam(':quantity2',$A);
      $sqlstm->bindParam(':total_ligne2',$B);
      $sqlstm->bindParam(':id_ligne_ticket2',$C);       

      $sqlstm->execute();

