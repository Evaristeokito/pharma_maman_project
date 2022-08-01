<?php 
 require_once __DIR__ . "./connection_database.php";

 if (isset($_POST['action']))
 {
   if (isset($_POST['action'])== 'fetch') 
   {
     $query = "
      SELECT * FROM vente
      INNER JOIN produit on vente.idproduit = produit.idproduit
      INNER JOIN client on vente.idcli = client.idcli
      INNER JOIN users on vente.iduser = users.iduser
     ";
   

   if (isset($_POST['search']['value']))
   {
     $query .= ' WHERE designation LIKE  "%' . $_POST['search']['value'] . '%" ';
   }

   if (isset($_POST["order"])) {
       $query .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
   } 
   else 
   {
     $query .= 'ORDER BY idvente DESC ';         
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
                $sub_array[] = $row["designation"];
                $sub_array[] = $row["date_vente"];
                $sub_array[] = $row["qte_vente"];
                $sub_array[] = $row["prix_de_vente"];
                $sub_array[] = $row["prix_net"];


                $sub_array[] = '<button type="button" name="editer" class="btn btn-success btn-sm editer" id="' . $row["idvente"] . '">
                            <i class="fas fa-edit"></i>
                            </button>';

                $sub_array[] = '<button type="button" name="deleter" class="btn btn-danger btn-sm deleter" id="' . $row["idvente"] . '">
                            <i class="fas fa-trash"></i>
                            </button>';

                $data[] = $sub_array;
            }

            $output = array(
                "draw" => intval($_POST["draw"]),
                "recordsTotal" => $filtered_rows,
                "recordsFiltered" => get_total_records($connect , "vente"),
                "data" => $data
            );

           echo json_encode($output);
    }

    if ($_POST['action']=="Add" || $_POST['action']=='Edit'){
      
    }
 }