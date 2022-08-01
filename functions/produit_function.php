<?php 
function familleList($connect){
  $query = "
  SELECT * FROM famille
  ";
  $statement = $connect->prepare($query);
  $statement->execute();
  $resultat = $statement->fetchAll();
  $output = '';

  foreach ($resultat as $row) {
   $output .= '<option value="'. $row['idfamille'] .'">'. $row['famille'] .'</option>';
  }

  return $output ;
}

function formatList($connect){
   $query = "
    SELECT * FROM format
   ";

   $statement = $connect->prepare($query);
   $statement->execute();
   $resultat = $statement->fetchAll();
   $output = '';

   foreach ($resultat as $row) {
      $output .= '<option value="'. $row['idformat'] .'">'. $row['format'] .' </option>';
   }

   return $output ;
}

function fill_produit_list($connect){
   $query = "
    SELECT * FROM product_disponible
   ";

   $statement = $connect->prepare($query);
   $statement->execute();
   $resultat = $statement->fetchAll();
   $output = '';

   foreach ($resultat as $row) {
      $output .= '<option value="'. $row['idproduit'] .'">'. $row['designation'] .' </option>';
   }

   return $output ;
}

function fill_fournisseur($connect) {
 $query = "SELECT * FROM fournisseur";
 $statement = $connect->prepare($query);
 $statement->execute();

 $res = $statement->fetchAll();

 $output = '';

 foreach ($res as $row) {
   $output .= '<option value="' . $row['idfournisseur'] .'">' . $row['nom'] . '</option>';
 }

 return $output ;
}

function fill_client($connect) {
   $query = "SELECT * FROM client";
   $statement = $connect->prepare($query);
   $statement->execute();

   $resultat = $statement->fetchAll(PDO::FETCH_OBJ);

   $output = '';

   foreach($resultat as $res){
      $output .= '<option value= "' . $res->idcli . '">' . $res->nom . '</option>';
   }

   return $output;
}

function productRef(){
  $reference = rand(1,9999);
  $value = "RFS-PR" . '-' . $reference ;

  return $value; 
}

function generateLiv(){
   $reference = rand(1,999);
   $val = "LL-PRD" . "-" . $reference ;
   return $val ;
}