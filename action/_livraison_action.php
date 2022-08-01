<?php 
 require_once __DIR__ .'./connection_database.php' ;

 if (isset($_POST['action']))
 {

  if ($_POST['action']== 'fetch'){
     
      $query = "SELECT * FROM v_all_livraison";
      
      if (isset($_POST['search']['value'])) {
        $query .= ' WHERE bon_livraison LIKE "%' . $_POST['search']['value'] . '%" ';
      }

      if (isset($_POST['order'])){
        $query .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
      }else {
        $query .= 'ORDER BY idlivraison DESC ';
      }

     if ($_POST["length"] != -1) 
     {
        $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
     }

     $statement = $connect->prepare($query);
     $statement->execute();
     $resultat = $statement->fetchAll();
     $data = [];
     $filter_rows = $statement->rowCount();

     foreach($resultat as $row){
      $sub_array = [];
      $sub_array[] = $row['bon_livraison'];
      $sub_array[] = $row['date_livraison'];
      $sub_array[] = $row['nom'];

      $sub_array[] = '<button class="btn btn-primary btn-xs btn_editer" name="btn_editer" id="'.$row['idlivraison'].'"">
        <i class="far fa-edit">
      </button>';

       $sub_array[] = '<button class="btn btn-danger btn-xs" name="btn_delete" id="'.$row['idlivraison'].'"">
        <i class="fas fa-trash-alt">
      </button>';

      $data[] = $sub_array;
     }

     $output = [
      "draw" => intval($_POST['draw']),
      "recordsTotal" => $filter_rows,
      "recordsFiltered" => get_total_records($connect , 'livraison'),
      "data" => $data
     ];

     echo json_encode($output);
  }

   if ($_POST['action']=='Add' || $_POST['action']=='Edit'){

      $error_bon_livraison = '';
      $error_fournisseur = '';
      $error_date_livraison = '';

      $error = 0;

      $bon_livraison = '';
      $fournisseur = '';
      $date_livraison = '';

      if (empty($_POST['bon_livraison']))
      {
         $error_bon_livraison = 'veuillez inserer le bon de livraison';
         $error ++;
      }
      else 
      {
          $bon_livraison  = htmlentities($_POST['bon_livraison']);
      }

      if (empty($_POST['date_livraison'])){
         $error_date_livraison = 'veuillez inserer la date livraison';
         $error ++ ;
      }
      else if ($_POST['date_livraison'] > date('yyyy-mm-dd')){
        $error_date_livraison = 'la date livraison ne peut pas etre superieur a la date du jour';
        $error ++ ;
      }
      else 
      {
        $date_livraison = htmlentities($_POST['date_livraison']);
      }

      if (empty($_POST['fournisseur']))
      {
          $error_fournisseur = 'veuillez inserer le nom fournisseur';
          $error ++;
      }
      else 
      {
          $fournisseur = htmlentities($_POST['fournisseur']);
      }

      if ($error > 0)
      {
          $output = [
            'error' => true,
            'error_date_livraison' => $error_date_livraison,
            'error_fournisseur' => $error_fournisseur,
            'error_bon_livraison' => $error_bon_livraison
          ];
      }
      else 
      {
        if ($_POST['action']=='Add')
        {
          $data = [
            ':bon_livraison' =>  $bon_livraison,
            ':date_livraison' => $date_livraison,
            ':fournisseur' =>    $fournisseur
          ];

          $query = "
          INSERT INTO livraison (bon_livraison,date_livraison,idfournisseur) 
          SELECT * FROM (SELECT :bon_livraison,:date_livraison,:fournisseur) as temp
          WHERE NOT EXISTS (SELECT bon_livraison FROM livraison WHERE bon_livraison = :bon_livraison) 
          LIMIT 1
          ";

          $statement = $connect->prepare($query);
          if ($statement->execute($data)){
            if ($statement->rowCount() > 0)
            {
                $output = [
                  'success' => true,
                  'message' => 'data inserted success',
                ];
            }else {
                  $output  = [
                    'error' => true,
                    'message' => 'data exist in db'
                  ];
            }
         }
       }
       if ($_POST['action']=='Edit')
       {
          $data = [
            ':bon_livraison' =>  $bon_livraison,
            ':date_livraison' => $date_livraison,
            ':fournisseur' =>    $fournisseur,
            ':livraison_id' =>   $_POST['livraison_id']
          ];

          $query = "UPDATE livraison 
          SET 
            bon_livraison = :bon_livraison,
            date_livraison = :date_livraison,
            idfournisseur = :fournisseur
            WHERE idlivraison = :livraison_id
          ";

          $statement = $connect->prepare($query);
          if ($statement->execute($data)){
            $output = [
              "success" => true,
              "message" => 'update is successfully'
            ];
          }
       }
    }
    echo json_encode($output);
   }

   if ($_POST['action']=='fetch_edit')
   {
     $query = "SELECT * FROM livraison WHERE idlivraison = :idlivraison";
     $statement = $connect->prepare($query);
     $statement->execute(['idlivraison' => $_POST['livraison_id']]);
     $resultat = $statement->fetchAll(PDO::FETCH_OBJ);
     $output = [] ;

     foreach ($resultat as $value) 
     {
       $output['bon_livraison'] = $value->bon_livraison;
       $output['date_livraison'] = $value->date_livraison;
       $output['fournisseur'] = $value->idfournisseur;
       $output['livraison_id'] = $value->idlivraison;
     }
     echo json_encode($output);
   }

   if ($_POST['action']=='delete')
   {
     $query = "DELETE FROM livraison WHERE idlivraison = '" . $_POST['livraison_id'] . "' ";
     $statement = $connect->prepare($query);
     if ($statement->execute()){
      echo 'livraison is delelte success';
     }
   }
 }