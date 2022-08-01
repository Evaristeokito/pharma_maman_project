<?php 
  include "./connection_database.php";

 const MAX_VALUE = 10;

 if (isset($_POST['action'])){

   if ($_POST['action'] == 'fetch') 
   {
        $query = "
          SELECT * FROM produit
          INNER JOIN famille on produit.idfamille = famille.idfamille
          INNER JOIN format  on produit.idformat = format.idformat
          INNER JOIN users   on produit.iduser = users.iduser
        ";

         if (isset($_POST['search']['value']))
        {
          $query .= 'WHERE designation LIKE "%' . $_POST['search']['value'] . '%"
          OR reference LIKE "%' . $_POST['search']['value'] . '%" OR 
          emplacement LIKE "%' .  $_POST['search']['value'] .  '%"  ';
        }

        if (isset($_POST["order"])) 
        {
          $query .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } 
        else 
        {
          $query .= 'ORDER BY idproduit DESC ';         
        }

        if ($_POST["length"] != -1) {
            $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
          }

            $stmt = $connect->prepare($query);
            $stmt->execute();
            $produits = $stmt->fetchAll();
            $data = array();
            $filtered_rows = $stmt->rowCount();
            foreach ($produits as $produit) 
            {
               $etats = "";
               if ($produit['etat']=='fonctionnel'){
                 $etats = '<button class="btn btn-primary btn-xs">
                  Le produit utilisable
                 </button>';
               }else {
                $etats = '<button class="btn btn-danger btn-xs">
                 Le produit est expiré
                </button>';
               }

                $sub_array = array();
                $sub_array[] = $produit["designation"];
                $sub_array[] = $produit["format"];
                $sub_array[] = $produit["stock"] .' ' . $produit["unite"];
                $sub_array[] = $etats;
                $sub_array[] = $produit["nom"];

                 $sub_array[] = '<button type="button" name="view_produit" class="btn btn-success btn-sm view_produit" id="' . $produit["idproduit"] . '">
                                 <i class="far fa-eye"></i>
                                </button>';

                $sub_array[] = '<button type="button" name="editer_produit" class="btn btn-info btn-sm editer_produit" id="' . $produit["idproduit"] . '">
                                 <i class="far fa-edit"></i>
                                </button>';

                $sub_array[] = '<button type="button" name="deleteProduit" class="btn btn-danger btn-sm deleteProduit" id="' . $produit["idproduit"] . '">
                                  <i class="far fa-trash-alt"></i>
                                </button>';

                $data[] = $sub_array;
            }

            $output = array(
                "draw" => intval($_POST["draw"]),
                "recordsTotal" => $filtered_rows,
                "recordsFiltered" => get_total_records($connect , "produit"),
                "data" => $data
            );

      echo json_encode($output);
   }

  if ($_POST['action'] == 'Add' || $_POST['action']=='Edit')
  {
            $error_reference = '';
            $error_designation = '';
            $error_format = '';
            $error_famille = '';
            $error_qte = '';
            $error_unite = '';
            $error_date_expiration = '';
            $error_emplacement = '';
            $error_alert = '';
 
            $error = 0;

            $produit_id = '';
            $reference = '';
            $designation = '';
            $qte = '';
            $unite = '';
            $date_expiration = '';
            $famille = '';
            $format = '';
            $fabricant = '';
            $emplacement = '';
            $alert = '';
            $iduser = '';

         if (empty($_POST['reference']))
         {
            $error_reference = 'la reference est requise';
            $error++ ;
          }
          else 
          {
            $reference = $_POST['reference'];
          }

          if (empty($_POST['designation']))
          {
            $error_designation = 'la designation est requise';
            $error++ ;
          }
          else 
          {
            $designation = $_POST['designation'];
          }

          if (empty($_POST['format']))
          {
            $error_format = 'le format est requis';
            $error++ ;
          }
          else 
          {
            $format = $_POST['format'];
          }

          if (empty($_POST['date_expiration']))
          {
            $error_date_expiration = 'la date expiration est requise';
            $error++ ;
          }
          else 
          {
            $date_expiration = $_POST['date_expiration'];
          }

          if (empty($_POST['famille']))
          {
            $error_famille='la famille est requise';
            $error++ ;
          }
          else 
          {
            $famille = $_POST['famille'];
          }

          if (empty($_POST['emplacement']))
          {
            $error_emplacement="l'emplacement est requise";
            $error++ ;
          }
          else 
          {
            $emplacement = $_POST['emplacement'];
          }

          if (empty($_POST['unite']))
          {
            $error_unite = 'indiquer l\'unite du produit';
            $error ++;
          }
          else 
          {
            $unite = $_POST['unite'];
          }

          if (empty($_POST['qte']))
          {
            $error_qte = 'la quantite est requise';
            $error++ ;
          }
          else 
          {
            $qte = $_POST['qte'];
            $qte = floatval($qte);
          }

          if (empty($_POST['alert']))
          {
              $error_alert = 'indiquer la valeur limite du stock';
              $error ++ ;
          }
          else if ($_POST['alert'] > MAX_VALUE ) 
          {
             $error_alert = 'la valeur maximal est de 10';
             $error ++ ;
          }
          else{
            $alert = $_POST['alert'];
            $alert = floatval($alert);
          }

        if ($error > 0)
        {
          $output = [
            'error' => true,
            'error_reference' => $error_reference,
            'error_designation' => $error_designation,
            'error_format' => $error_format,
            'error_qte' => $error_qte,
            'error_emplacement' => $error_emplacement,
            'error_date_expiration' => $error_date_expiration,
            'error_famille' => $error_famille,
            'error_unite' => $error_unite,
            'error_alert' => $error_alert,
          ];
        }
       else {
            if ($_POST['action'] == 'Add')
            {
                $data = [
                  ':designation' => $designation,
                  ':reference' => $reference,
                  ':qte' => $qte,
                  ':unite' => $unite,
                  ':alert' => $alert,
                  ':date_expiration' => $date_expiration,
                  ':etat' => htmlentities($_POST['etat']),
                  ':emplacement' => $emplacement,
                  ':fabricant' => htmlentities($_POST['fabricant']),
                  ':forme' => $format,
                  ':famille' => $famille,
                  ':iduser' => $_SESSION['user_id'],
                ];

                $query = "INSERT INTO produit 
                            (designation,reference,stock,unite,alert,dateexpiration,etat,emplacement,fabricant,idformat,idfamille,iduser) 
                            SELECT * FROM (SELECT :designation,:reference,:qte,:unite,:alert,:date_expiration,:etat,:emplacement,:fabricant,:forme,:famille,:iduser) as temp 
                            WHERE NOT EXISTS (
                            SELECT designation FROM produit WHERE designation = :designation
                            ) LIMIT 1
                          ";

                         $statement = $connect->prepare($query);
                         if ($statement->execute($data)) {
                            if ($statement->rowCount() > 0) 
                            {
                                $output = [
                                   'success' => 'Le produit est bel bien ajouter',
                                ];
                            } 
                            else 
                            {
                                $output = [
                                  'error' => true,
                                  'error_designation' => 'Cet enregistrement existe deja',
                                ];
                            }
                        }
                }
                if ($_POST['action'] == 'Edit')
                {
                    $data = [
                    ':reference' => $reference,
                    ':designation' => $designation,
                    ':format' => $format,
                    ':famille' => $famille,
                    ':qte' => $qte,
                    ':unite' => $unite,
                    ':emplacement' => $emplacement,
                    ':date_expiration' => $date_expiration,
                    ':alert' => $alert,
                    ':fabricant' => htmlentities($_POST['fabricant']),
                    ':produit_id' => htmlentities($_POST['produit_id']),
                   ];

                    $query = "UPDATE produit SET
                    designation = :designation,
                    reference = :reference,
                    stock = :qte,  
                    unite = :unite,
                    alert = :alert,
                    dateexpiration = :date_expiration,
                    emplacement = :emplacement,
                    fabricant = :fabricant,
                    idformat = :format,
                    idfamille = :famille
                    WHERE idproduit = :produit_id
                    ";

                    $statement = $connect->prepare($query);
                    if ($statement->execute($data)){
                      $output = [
                        'success' => 'Product is successfully update',
                      ];
                    }else {
                      $output = [
                        'error' => true
                      ];
                    }
              }
         }
         echo json_encode($output);
  }

  if ($_POST["action"] == 'single_fetch') {
        
        $query = "SELECT * FROM produit 
        INNER JOIN format on produit.idformat = format.idformat
        INNER JOIN famille on produit.idfamille = famille.idfamille
        WHERE idproduit = '" . htmlentities($_POST['produit_id']) . "'
        ";

        $statement = $connect->prepare($query);
        if ($statement->execute()) {
            $result = $statement->fetchAll();
            $output = '
             <div class="row">
            ';
            foreach ($result as $row) {
                 $etat = '';
                  if($row['etat'] == 'fonctionnel')
                  {
                    $etat = '<span class="btn btn-success btn-sm">Fonctionnel</span>';
                  }
                  else
                  {
                    $etat = '<span class="btn btn-danger btn-sm">Expirer</span>';
                  }

                $output .= '
                    <div class="col-md-3">
                      <img src="../public/assets/user-img/qr_code.png" width="150" height="150" alt="IMG">
                    </div>
                    <div class="col-md-9">
                     <table class="table table-striped">
                      <tr>
                       <th>Designation</th>
                       <td>' . $row["designation"] . '</td>
                      </tr>
                       <tr>
                       <th>Stock Reference </th>
                       <td>' . $row["reference"] . '</td>
                      </tr>
                      <tr>
                      <tr>
                       <th>Format</th>
                       <td>' . $row["format"] . '</td>
                      </tr>
                      <tr>
                       <th>Famille</th>
                       <td>' . $row["famille"] . '</td>
                      </tr>
                      <tr>
                       <th>Stock</th>
                       <td>' . $row["stock"] . ' ' . $row["unite"] . '</td>
                      </tr>
                      <tr>
                       <th>Niveau d\'alert </th>
                       <td>' . $row["alert"] . '</td>
                      </tr>
                       <th>Expiration</th>
                       <td>' . $row["dateexpiration"] . '</td>
                      </tr>
                      <tr>
                       <th>Emplacement</th>
                       <td>' . $row["emplacement"] . '</td>
                      </tr>
                      <tr>
                       <th>Fabricant</th>
                       <td>' . $row["fabricant"] . '</td>
                      </tr>
                      <tr>
                       <th>Etat</th>
                       <td>' . $etat . '</td>
                      </tr>
                     </table>
                    </div>
                    ';
            }
            $output .= '</div>';
            echo $output;
      }
  }

  if ($_POST['action'] == 'edit_fetch')
  {
      $query = "SELECT * FROM produit 
      WHERE idproduit = '" . htmlentities($_POST['produit_id']) . "'
      ";

    $statement = $connect->prepare($query);

    if ($statement->execute())
    {
      $resultat = $statement->fetchAll();
      foreach($resultat as $row)
      {

        $output['reference'] = $row['reference'];
        $output['designation'] = $row['designation'];
        $output['stock'] = $row['stock'];
        $output['unite'] = $row['unite'];
        $output['alert'] = $row['alert'];
        $output['dateexpiration'] = $row['dateexpiration'];
        $output['emplacement'] = htmlentities($row['emplacement']);
        $output['fabricant'] = $row['fabricant'];
        $output['idfamille'] = $row['idfamille'];
        $output['idformat'] = $row['idformat'];
        $output['produit_id'] = $row['idproduit'];

      }
      echo json_encode($output);
    }
  }

  if ($_POST["action"] == "delete") 
  {
    $query = "DELETE FROM produit WHERE produit.idproduit = '" . $_POST["produit_id"] . "'";
    $statement = $connect->prepare($query);
      if ($statement->execute()) 
      {
          echo 'Data Delete Successfully';
      }
  }

}
