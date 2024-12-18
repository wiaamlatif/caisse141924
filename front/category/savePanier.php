<?php
session_start();
if(!isset($_SESSION)){
  header('location:http://localhost:8000/include/connexion.php');
} 

 //*  echo $_GET['idUser']; 
 //*______________________(panier.php)______________________ */

 //*____________________________________________________________*/
 //*PDO("mysql:host=localhost;dbname=caisse1124","root","root");*/

 //*____________________________________________________________*/
 //* This file need  :
 //* id_user du ticket. 
 //* Le dernier nr_ticket. 
 
 //*___________________(products)___________________________*/
 /* id_product
   	name_product
    id_category
    description
    price
    imgSrc
    date_product	*/
 //*____________________(tickets)_____________________________*/
 /* id_ticket
   	id_user
  	id_z
  	nr_ticket
  	total_ticket
  	validated
  	date_ticket	*/
 //*___________________(lignes_ticket)_______________________*/
 /* id_ligne_ticket
   	id_ticket	
    id_product
    price	
    quantity	
    total_ligne	*/
//*____________________________________________________________

  include "count_items.php";

  //sqlValue
  if(!empty($panier)){

    //id_produits
    $id_produits_du_panier=array_keys($panier);
    $id_produits=implode(",",$id_produits_du_panier);
  
    require_once 'C:/caisse191124/include/database.php';
    
    //Trouver dans la table "products" les items du panier
    $sqlstm = $pdo -> prepare('SELECT * FROM products 
                               WHERE id_product IN ('.$id_produits.') ');
    $sqlstm -> execute();
    $produitsPanier = $sqlstm -> fetchAll(PDO::FETCH_ASSOC);
 
    $itemsPanier=[];       
    $totalPanier=0; 
    foreach ($produitsPanier as $row) { 

      $idProduct=$row['id_product'];
          $price=$row['price'];
       $qantity = $panier[$idProduct];      
      $totalItem=$price*$qantity;
      $totalPanier+= $totalItem  ;

      //Un tableau detail panier => Ticket
      $itemsPanier[] = [
       "id_product" => $idProduct,
            "price" => $price,
         "quantity" => $panier[$idProduct],
      "total_ligne" => $totalItem
               ];
    }
     
  //Update table "tickets" :
  /*  id_ticket
      id_user
      id_z
      nr_ticket
      total_ticket
      validated
      date_ticket	*/

  // < 1 > nr_ticket

  $nr_ticket = lastNrTicket()+1;
        //12345678
  // 8 => 00000000
  $nr_ticket = str_pad($nr_ticket, 8, '0', STR_PAD_LEFT);

  
  // < 2 > id_user
  $id_user=$_SESSION['user']['id_user'];

  $id_z=0;
  $validated=0;

  $sql="INSERT INTO tickets (id_user,id_z,nr_ticket,total_ticket,validated) 
        VALUES (?,?,?,?,?);";
  $sqlStatement = $pdo ->prepare($sql);
  $sqlStatement -> execute([$id_user,$id_z,$nr_ticket,$totalPanier,$validated]);
  $id_ticket  = $pdo -> lastInsertId();

  // Update table "lignes_ticket" :
  /*  id_ligne_ticket
      id_ticket	
      id_product
      price	
      quantity	
      total_ligne	*/

  $sqlValue="";
  foreach ($itemsPanier as $itemPanier) {

    $idProduct=$itemPanier['id_product'];
    $price=$itemPanier['price'];
    $quantity=$itemPanier['quantity'];
    $totalLigne=$itemPanier['quantity'];

    $sqlValue.="INSERT INTO lignes_ticket (id_ticket,id_product,price,quantity,total_ligne)
                VALUES ($id_ticket,
                        $idProduct,
                        $price,
                        $quantity,
                        $totalLigne);";

     $sqlStatement = $pdo->prepare($sqlValue);
  }
    
  $sqlStatement->execute();

  //clear all cookies 
  for ($i=0; $i < 1000; $i++) { 
    $cookie_name=$i;
    setcookie($cookie_name,"", time() - 3600, '/');   
  }

  
  header( "location:panier.php");          

  }//if(!empty($panier))

  function lastNrTicket()
  {
    require 'C:caisse191124/include/database.php';

    $sql = 'SELECT * FROM tickets
            ORDER BY id_ticket DESC LIMIT 1';

    $sqlstm = $pdo -> prepare($sql);
    $sqlstm -> execute();
    
    $listTickets = $sqlstm -> fetch(PDO::FETCH_ASSOC);
    
    return (int) $listTickets['nr_ticket'];
  }

/*
    echo "<pre>";
    var_dump($prdPanier);
    echo "</pre>";die();
*/


 


