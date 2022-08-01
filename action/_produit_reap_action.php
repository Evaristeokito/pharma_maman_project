<?php 

 include __DIR__ . "./connection_database.php";

 if (isset($_POST['action'])){
   
   if ($_POST['action'] == 'Edit_fetch'){

     $query = "SELECT * FROM produit WHERE idproduit = '". $_POST['produit_id'] ."' ";
     $statement = $connect->prepare($query);

     if ($statement->execute()){
       $res = $statement->fetchAll();
       $output = [];
       foreach ($res as $row) 
       {
         $output['stock'] = $row['stock'];
         $output['designation'] = $row['designation'];
         $output['unite'] = $row['unite'];
         $output['alert']= $row['alert'];
         $output['stock_max'] = $row['stock_max'];
         $output['produit_id'] = $row['idproduit'];
       }
       echo json_encode($output);
     }
   }

   if ($_POST['action'] == 'Edit'){

   }
 }