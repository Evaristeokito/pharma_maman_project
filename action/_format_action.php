<?php
    include "./connection_database.php";

    if (isset($_POST['action']))
    {

        if ($_POST["action"] == 'fetch') 
        {
            $query = "
            SELECT idformat,format,description ,nom
            FROM format
            INNER JOIN users on format.iduser = users.iduser
           ";
            if (isset($_POST["search"]["value"])) 
            {
                $query .= 'WHERE format LIKE "%' . $_POST["search"]["value"] . '%"  ';
            }
            if (isset($_POST["order"])) {
                $query .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
            } else {
                $query .= 'ORDER BY idformat DESC ';
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
                $sub_array[] = $row["idformat"];
                $sub_array[] = $row["format"];
                $sub_array[] = $row["description"];
                $sub_array[] = $row["nom"];

                $sub_array[] = '<button type="button" name="editer_format" class="btn btn-success btn-sm editer_format" id="'.$row["idformat"] .'">
                             <i class="far fa-edit"></i>
                            </button>';

                $sub_array[] = '<button type="button" name="deleter_format" class="btn btn-danger btn-sm deleter_format" id="'. $row["idformat"] .'">
                             <i class="far fa-trash-alt"></i>
                            </button>';

                $data[] = $sub_array;
            }

            $output = array(
                "draw" => intval($_POST["draw"]),
                "recordsTotal" => $filtered_rows,
                "recordsFiltered" => get_total_records($connect , "format"),
                "data" => $data
            );

           echo json_encode($output);
        }

        if ($_POST['action'] == 'Add' || $_POST['action'] == "Edit") 
        {
                $error_format = '';

                $format_id = '';
                $format = '';
                $description = '';

               $error = '';

        if(empty($_POST["format"])) 
        {
            $error_format = "le nom est requis";
            $error++;
        } 
        else {
            
            $format = $_POST['format'];
        }

        if ($error > 0) 
        {

            $output = array(
                'error' => true,
                'error_format' => $error_format,
            );
        } 
        else 
        {
            if ($_POST["action"] == 'Add') 
            {
                $data = array(
                    ':format' => $format,
                    ':description' => htmlentities($_POST['description']),
                    ':iduser' => $_SESSION['user_id']
                );

                $query = "
                    INSERT INTO format
                    (format,description,iduser) 
                    SELECT * FROM (SELECT :format,:description,:iduser) as temp 
                    WHERE NOT EXISTS (
                     SELECT format FROM format WHERE format = :format
                    ) LIMIT 1
                  ";

                $statement = $connect->prepare($query);
                if ($statement->execute($data)) {
                    if ($statement->rowCount() > 0) {

                        $output = array(
                            'success' => 'true',
                        );
                    } 
                    else 
                    {
                        $output = array(
                            'error' => true,
                            'error_format' => 'Cet enregistrement existe deja'
                        );
                    }
                }
            }
            if ($_POST["action"] == "Edit") 
            {
                $data = array(
                    ':format' => $format,
                    ':description' => htmlentities($_POST['description']),
                    ':format_id' => htmlentities($_POST["format_id"])
                );
                $query = "
                        UPDATE format
                        SET format = :format,
                        description = :description
                        WHERE idformat = :format_id
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
        $query = "SELECT * FROM format WHERE format.idformat = '" . htmlentities($_POST["format_id"]) . "'";
        $statement = $connect->prepare($query);
        if ($statement->execute()) {
            $result = $statement->fetchAll();
            foreach ($result as $row) {
                $output['format'] = $row["format"];
                $output['description'] = $row['description'];
                $output['format_id'] = $row['idformat'];
            }
            echo json_encode($output);
        }
    }

    if ($_POST["action"] == "delete") 
    {
        $query = "DELETE FROM format WHERE format.idformat = '" . htmlentities($_POST["format_id"]) . "'";
        $statement = $connect->prepare($query);
        if ($statement->execute()) {
            echo 'Data Delete Successfully';
        }
    }

}
