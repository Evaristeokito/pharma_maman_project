<?php 
 include "./connection_database.php";

 if (isset($_POST['action'])){

  if ($_POST['action'] == 'fetch'){

    $query = "SELECT * FROM client";

    if (isset($_POST['search']['value'])){
      $query .= ' WHERE nom LIKE "%' . $_POST['search']['value'] . '%" ';
    }

    if (isset($_POST["order"])) {
      $query .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
    } 
    else 
    {
      $query .= 'ORDER BY idcli DESC ';
    }

    if ($_POST["length"] != -1) {
       $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
    }

     $statement = $connect->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll();
            $data = array();
            $filtered_rows = $statement->rowCount();
            foreach ($result as $row) {

                $sub_array = array();
                $sub_array[] = $row["nom"];
                $sub_array[] = $row["type_client"];
                $sub_array[] = $row["telephone"];
                $sub_array[] = $row["email"];
                $sub_array[] = substr($row["adresse"],0,25);

                $sub_array[] = '<button type="button" name="editer_client" class="btn btn-success btn-sm editer_client" id="' . $row["idcli"] . '">
                                 <i class="far fa-edit"></i>
                                </button>';

                $sub_array[] = '<button type="button" name="deleter_client" class="btn btn-danger btn-sm deleter_client" id="' . $row["idcli"] . '">
                                  <i class="far fa-trash-alt"></i>
                                </button>';

                $data[] = $sub_array;
            }

            $output = array(
                "draw" => intval($_POST["draw"]),
                "recordsTotal" => $filtered_rows,
                "recordsFiltered" => get_total_records($connect , "client"),
                "data" => $data
            );

           echo json_encode($output);
  }

   if ($_POST['action'] == 'add'){
      $client_nom = '';
      $client_type = ''; 

      $error = 0;

      $error_client_nom = '';
      $error_client_type = '';

      if (empty($_POST['client_nom'])){
        $error_client_nom = 'veuillez inserer le nom';
        $error ++ ;
      }else {
        $client_nom = htmlentities($_POST['client_nom']);
      }

      if (empty($_POST['client_type'])){
       $error_client_type = 'veuillez inserer le type de client';
       $error ++ ;
      }else {
       $client_type = htmlentities($_POST['client_type']);
      }

      if ($error > 0){
        $output = [
          'error_client_nom' => $error_client_nom,
          'error_client_type' => $error_client_type
        ];
      }else {
         $data = [
            ':client_nom' => $client_nom ,
            ':client_type' => $client_type,
            ':client_email' => $_POST['client_email'] ,
            ':client_telephone' => $_POST['client_telephone'],
            ':client_adresse' => $_POST['client_adresse']
         ];
          
        $query = "INSERT INTO client (nom,type_client,telephone,email,adresse)
        SELECT * FROM (SELECT :client_nom,:client_type,:client_telephone,:client_email,:client_adresse) as temp
        WHERE NOT EXISTS (SELECT nom FROM client WHERE nom = :client_nom) 
        LIMIT 1
        ";

        $statement = $connect->prepare($query);
        if ($statement->execute($data)){
          if ($statement->rowCount() > 0){
              $output = [
                'success' => true,
                'message' => 'data inserted successfully'
              ];
          }else {
           $output = [
             'error' => true,
             'message' => 'data is exist in db',
           ];
          }
        }
      }
    echo json_encode($output);
   }
 }

 ?>