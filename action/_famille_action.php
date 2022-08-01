<?php
    include "./connection_database.php";

    if (isset($_POST['action']))
    {

        if ($_POST["action"] == 'fetch') 
        {
            $query = "
            SELECT  * FROM famille
            INNER JOIN users ON famille.iduser = users.iduser
           ";
            if (isset($_POST["search"]["value"])) 
            {
                $query .= 'WHERE famille LIKE "%' . $_POST["search"]["value"] . '%"  ';
            }
            
            if (isset($_POST["order"])) {
                $query .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
            } else {
                $query .= 'ORDER BY idfamille DESC ';
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
                $sub_array[] = '
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary btn-sm">Action</button>
                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
                      <span class="sr-only">Toggle Dropdown</span>
                      <div class="dropdown-menu" role="menu">
                        <a type="button" class="dropdown-item editer_famille" name="editer_famille" id="' .$row['idfamille'] . '">Modifier</a>
                        <a class="dropdown-item" href="#">Afficher les details</a>
                        <a class="dropdown-item" href="#">Placer dans Corbeil</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" name="deleter_famille" id="'  .$row['idfamille'] . '">Suppression definitif</a>
                      </div>
                    </button>
                 </div>
                </div>
                ';  
                $sub_array[] = $row["idfamille"];
                $sub_array[] = $row["famille"];
                $sub_array[] = substr($row["description"],0,25);
                $sub_array[] = $row["nom"];

                $data[] = $sub_array;
            }

            $output = array(
                "draw" => intval($_POST["draw"]),
                "recordsTotal" => $filtered_rows,
                "recordsFiltered" => get_total_records($connect , "famille"),
                "data" => $data
            );

           echo json_encode($output);
        }

     if ($_POST["action"] == 'Add' || $_POST['action'] == "Edit"){
                $error_famille = '';

                $famille_id = '';
                $famille = '';
                $description = '';
                $iduser = '';

               $error = 0;

        if (empty($_POST["famille"])) 
        {
            $error_famille = "le nom est requis";
            $error++;
        } 
        else {
            $famille = $_POST['famille'];
        }

        if ($error > 0) {

            $output = array(
                'error' => true,
                'error_famille' => $error_famille,
            );
        } else {
            if ($_POST["action"] == 'Add') 
            {
                $data = array(
                    ':famille' => $famille,
                    ':description' => htmlentities($_POST['description']),
                    ':iduser' => $_SESSION['user_id'],
                );

                $query = "
                    INSERT INTO famille
                    (famille,description,iduser) 
                    SELECT * FROM (SELECT :famille, :description,:iduser) as temp 
                    WHERE NOT EXISTS (
                     SELECT famille FROM famille WHERE famille = :famille
                    ) LIMIT 1
                  ";

                $statement = $connect->prepare($query);
                if ($statement->execute($data)) {
                    if ($statement->rowCount() > 0) {
                        $output = array(
                            'success' => 'true',
                        );
                    } else {
                        $output = array(
                            'error' => true,
                            'error_famille' => 'Cet enregistrement existe deja'
                        );
                    }
                }
            }
            if ($_POST["action"] == "Edit") 
            {
                $data = array(
                    ':famille' => $famille ,
                    ':description' => htmlentities($_POST['description']),
                    ':famille_id' => $_POST['famille_id']
                );
                $query = "
                        UPDATE famille 
                        SET famille = :famille,
                        description = :description
                        WHERE idfamille = :famille_id
                     ";

                $statement = $connect->prepare($query);
                if ($statement->execute($data)) {
                    $output = array(
                        'success' => 'Data Edited Successfully',
                    );
                }
            }
        }
        echo json_encode($output);
    }

    if ($_POST["action"] == "edit_fetch") 
    {
        $query = "SELECT * FROM famille WHERE idfamille = '" . $_POST["famille_id"] . "'";
        $statement = $connect->prepare($query);
        if ($statement->execute()) {
            $result = $statement->fetchAll();
            foreach ($result as $row) {
                $output['famille'] =     $row["famille"];
                $output['description'] = $row['description'];
                $output['famille_id'] =  $row['idfamille'];
            }
            echo json_encode($output);
        }
    }

    if ($_POST["action"] == "delete") 
    {
        $query = "DELETE FROM famille WHERE famille.idfamille = '" . $_POST["famille_id"] ."'";
        $statement = $connect->prepare($query);
        if ($statement->execute()) {
            echo 'Data Delete Successfully';
        }
    }

}
