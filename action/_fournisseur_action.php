<?php 
 require_once __DIR__ . './connection_database.php';

 if (isset($_POST['action']))
 {
    
   if ($_POST['action'] === 'fetch'){
     
    $query = "SELECT * FROM fournisseur" ;
   
    if (isset($_POST['search']['value']))
    {
      $query .= ' WHERE nom LIKE "%' .$_POST['search']['value'] . '%" or 
      ville LIKE "%' . $_POST['search']['value'] . '%" ' ;
    }

    if (isset($_POST["order"])) 
    {
       $query .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
     } 
     else 
     {
      $query .= 'ORDER BY idfournisseur DESC ';         
     }

     if ($_POST["length"] != -1) 
     {
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
                $sub_array[] = $row["ville"];
                $sub_array[] = $row["telephone"];
                $sub_array[] = $row["adresse"];
                $sub_array[] = $row["email"];

               $sub_array[] = '<button type="button" name="editer_fournisseur" class="btn btn-success btn-sm editer_fournisseur" id="' . $row["idfournisseur"] . '">
                             <i class="far fa-edit"></i>
                            </button>';

                $sub_array[] = '<button type="button" name="delete_fournisseur" class="btn btn-danger btn-sm delete_fournisseur" id="' . $row["idfournisseur"] . '">
                            <i class="far fa-trash-alt"></i>
                            </button>';

                $data[] = $sub_array;
            }

            $output = array(
                "draw" => intval($_POST["draw"]),
                "recordsTotal" => $filtered_rows,
                "recordsFiltered" => get_total_records($connect , "fournisseur"),
                "data" => $data
            );
          echo json_encode($output);
        }

      if ($_POST['action'] =='Add' || $_POST['action'] =='Edit'){
        
            $nom = '';
            $ville = '';
            $telephone = '';
            $email = '';
            $adresse = '';

            $error_nom = '';
            $error_ville = '';
            $error_adresse = '';
            $error_telephone = '';

            $error = 0;

            if (empty($_POST['nom']))
            {
              $error_nom = 'le nom est requis';
              $error ++ ;
            }else {
              $nom = $_POST['nom'];
            }

            if (empty($_POST['ville'])){
              $error_ville = 'le nom de la ville est requise';
              $error ++ ;
            }else {
              $ville = $_POST['ville'];
            }

            if (empty($_POST['adresse'])){
              $error_adresse = "L'adresse est requise";
              $error ++ ;
            }else {
              $adresse = $_POST['adresse'];
            }

            if (empty($_POST['telephone'])){
              $error_telephone = 'le telephone est requis';
              $error++;
            }else {
              $telephone = $_POST['telephone'];
            }

            if ($error > 0){

              $output = [
                'error' => true ,
                'error_nom' => $error_nom,
                'error_ville' => $error_ville,
                'error_adresse' => $error_adresse,
                'error_telephone' => $error_telephone
              ];

            }else {

              if ($_POST['action'] == 'Add'){
                 
                 $data = [
                  ':nom' => $nom,
                  ':ville' => $ville,
                  ':adresse' => $adresse,
                  ':telephone' => $telephone,
                  ':email' => $_POST['email'],
                 ];

                 $query = "
                   INSERT INTO fournisseur (nom,ville,adresse,telephone,email)
                   SELECT * FROM (SELECT :nom,:ville,:adresse,:telephone,:email) as temp
                   WHERE NOT EXISTS (SELECT nom FROM fournisseur WHERE nom = :nom)
                 ";

                 $statement = $connect->prepare($query);
                 if ($statement->execute($data)){
                   if ($statement->rowCount() > 0){

                     $output = [
                        'success' => 'data inserted success'
                     ];
                   }else {
                     $output = [
                        'error' => true,
                        'error_nom' => 'cet enregistrement existe deja'
                     ];
                   }
                 }
              }
              if ($_POST['action']=='Edit'){

                $data = [
                  ':nom' => $nom,
                  ':ville' => $ville,
                  ':adresse' => $adresse,
                  ':telephone' => $telephone,
                  ':email' => $_POST['email'],
                  ':fournisseur_id' => $_POST['fournisseur_id'],
                ];
                

                $query = "UPDATE fournisseur SET 
                 nom = :nom,
                 ville = :ville,
                 adresse = :adresse,
                 telephone = :telephone,
                 email = :email
                 WHERE idfournisseur = :fournisseur_id
                ";

                $statement = $connect->prepare($query);
                if ($statement->execute($data)){
                  $output = [
                    "success" => 'le fournisseur est mis a jour'
                  ];
                }else {
                  $output = [
                    "error" => true
                  ];
                }
              }
            }
            echo json_encode($output);
           }

           if ($_POST['action']== 'edit_fetch')
           {
              $query = "SELECT * FROM fournisseur WHERE idfournisseur = '" . htmlentities($_POST['fournisseur_id']) . "' ";
              $statement = $connect->prepare($query);
           
           if ($statement->execute())
           {
            $resultat = $statement->fetchAll();
            foreach ($resultat as $row) {
              $output['nom'] = $row['nom'];
              $output['ville'] = $row['ville'];
              $output['adresse'] = $row['adresse'];
              $output['telephone'] = $row['telephone'];
              $output['email'] = $row['email'];
              $output['fournisseur_id'] = $row['idfournisseur'];
            }
            echo json_encode($output);
           }

        }

        if ($_POST['action']== 'delete'){
          $query = "DELETE fournisseur WHERE idfournisseur = :fournisseur_id";
          $statement = $connect->prepare($query);
          if ($statement->execute(['idfournisseur' => $_POST['fournisseur_id']])){
              echo 'Delete fournisseur'; 
          }

          echo 'Delete fournisseur';
        }

 }