<?php 

 require_once __DIR__ . './connection_database.php';

 if (isset($_POST['action'])){

   if ($_POST['action']== 'fetch'){
     
     $query = "
      SELECT * FROM affiche_toutes_commande
     " ;

     if (isset($_POST['search']['value']))
     {

      $query .= " WHERE designation LIKE '%" . $_POST['search']['value'] . "%' ";

     }

     if (isset($_POST['order']))
     {
       $query .= ' ORDER BY' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ' ;
     }
     else 
     {
       $query .= ' ORDER BY idcommande DESC';
     }

     if (isset($_POST['length']) != -1)
     {
      $query .= 'LIMIT' . $_POST['start'] . ',' . $_POST['length'];
     }

            $statement = $connect->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll();
            $data = array();
            $filtered_rows = $statement->rowCount();
            foreach ($result as $row) {

                $sub_array = array();
                $sub_array[] = $row["bon_commande"];
                $sub_array[] = $row["designation"];
                $sub_array[] = $row['format'];
                $sub_array[] = $row["date_commande"];
                $sub_array[] = $row["qte_commande"];
                $sub_array[] = $row["montant"];
                $sub_array[] = $row["montant_total"];

                $sub_array[] = '<button type="button" name="editer" class="btn btn-success btn-sm editer" id="' . $row["idcommande"] . '">
                            <i class="far fa-edit"></i>
                            </button>';

                $sub_array[] = '<button type="button" name="deleter" class="btn btn-danger btn-sm deleter" id="' . $row["idcommande"] . '">
                            <i class="fas fa-trash-alt"></i>
                            </button>';

                $data[] = $sub_array;
            }

            $output = array(
                "draw" => intval($_POST["draw"]),
                "recordsTotal" => $filtered_rows,
                "recordsFiltered" => get_total_records($connect , "commande"),
                "data" => $data
            );

           echo json_encode($output);
   }
 }
