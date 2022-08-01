<?php 
 include './connection_database.php';

 if (isset($_POST['action']))
 {

   if ($_POST['action'] == 'fetch')
   {

     $query = "
       SELECT * FROM users
     ";

     if (isset($_POST['search']['value']))
     {

       $query .= ' WHERE nom LIKE "%' . $_POST['search']['value'] . '%" OR
         telephone LIKE "%' . $_POST['search']['value'] . '%"
        ';
     }

     if (isset($_POST['order']))
     {
        $query .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
     }
     else 
     {
      $query .= ' ORDER BY iduser DESC';
     }

     if ($_POST['length'] != -1)
     {
       $query .= ' LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
     }

     $statement = $connect->prepare($query);
     $statement->execute();
     $result = $statement->fetchAll();
     $data = array();
     $filtered_rows = $statement->rowCount();

     foreach ($result as $row) {

      $status ='';

      if ($row['status'] == 'Actif')
       {
         $status = '<span class="btn btn-success btn-xs">Actif</span>';
       }
       else 
       {
        $status = '<span class="btn btn-danger btn-xs">Inactif</span>';
       }

       $sub_array = array();
       $sub_array[] = '
          <div class="btn-group">
                    <button type="button" class="btn btn-primary btn-sm">Action</button>
                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
                      <span class="sr-only">Toggle Dropdown</span>
                      <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" href="#"  name="editer_user" id="' .$row['iduser'] . '">Modifier</a>
                        <a class="dropdown-item" href="#">Afficher les details</a>
                        <a class="dropdown-item" href="#">Placer dans Corbeil</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" name="delete" id="'  .$row['iduser'] . '">Suppression definitif</a>
                      </div>
                    </button>
                </div>
          </div>
      ';
       $sub_array[] = $row['nom'];
       $sub_array[] = $row['sexe'];
       $sub_array[] = $row['telephone'];
       $sub_array[] = $row['email'];
       $sub_array[] = $status;
       $sub_array[] = '<img src="../public/assets/user-img/' .$row['img'] . '" class="img-circle" width="50" height="50"  />';


       $data[] = $sub_array;
     }

     $output = [
      "draw" => intval($_POST['draw']),
      "recordsTotal" => $filtered_rows,
      "recordsFiltered" => get_total_records($connect , "users"),
      "data" => $data,
     ];

     echo json_encode($output);
   }

   if ($_POST['action']== 'Add' || $_POST['action']== 'Edit')
   {
    $error = '';

     $user_nom = '';
     $user_sexe = '';
     $user_telephone = '';
     $user_password = '';
     $user_email ='';
     $user_status = '';
     $user_role = '';
     $user_img = '';

     $error_user_nom = '';
     $error_user_status = '';
     $error_user_password = '';
     $error_user_sexe = '';
     $error_user_role = '';
     $error_user_img = '';

     $user_img = $_POST["hidden_user_img"];

        if ($_FILES["user_img"]["name"] != '') {
            $file_name = $_FILES["user_img"]["name"];
            $tmp_name = $_FILES["user_img"]['tmp_name'];
            $extension_array = explode(".", $file_name);
            $extension = strtolower($extension_array[1]);
            $allowed_extension = array('jpg', 'png');
            if (!in_array($extension, $allowed_extension)) {
                $error_user_img = 'Mauvais format (le format accepte : jpg et png)';
                $error++;
            } else {
                $user_img = uniqid() . '.' . $extension;
                $upload_path = '../public/assets/user-img/' . $user_img;
                move_uploaded_file($tmp_name, $upload_path);
            }
        } else {
            if ($user_img == '') {
                $error_user_img = $user_img;
                $error++;
            }
        }

     if (empty($_POST['user_nom']))
     {
      $error_user_nom = 'le nom est requis';
      $error++;
     }
     else 
     {
      $user_nom =$_POST['user_nom'];
     }

     if (empty($_POST['user_sexe']))
     {
      $error_user_sexe = 'le sexe est requis';
      $error++;
     }
     else 
     {
      $user_sexe =  $_POST['user_sexe'];
     }

     if (empty($_POST['user_role']))
     {
        $error_user_role = 'le role est requis';
        $error ++ ;
     }
     else 
     {
      $user_role = $_POST['user_role'];

     }

     if (empty($_POST['user_password']))
     {
      $error_user_password = 'the password is required';
      $error++ ;
     }
     else 
     {
        $user_password  = $_POST['user_password'];
     }

     if (empty($_POST['user_status']))
     {
      $error_user_status = 'status is required';
      $error++;
     }
     else {
      $user_status = $_POST['user_status'];
     }

     if ($error > 0){

      $output = [

          'error' => true,
          'error_user_nom' => $error_user_nom,
          'error_user_sexe' => $error_user_sexe,
          'error_user_status' => $error_user_status,
          'error_user_role' => $error_user_role,
          'error_user_password' => $error_user_password,
          'error_user_img' => $error_user_img,
      ];
     }
     else
     {
         if ($_POST['action'] =='Add')
         {

          $data = [
            ':user_nom' => $user_nom,
            ':user_sexe' => $user_sexe,
            ':user_role' => $user_role,
            ':user_password' => password_hash($user_password,PASSWORD_DEFAULT),
            ':user_telephone' => $_POST['user_telephone'],
            ':user_email' => $_POST['user_email'],
            ':user_status' => $user_status,
            ':user_img' => $user_img
          ];

          $query = "
          INSERT INTO users 
          (nom ,sexe,role,password, telephone, email, status,img)
          SELECT * FROM (SELECT :user_nom,:user_sexe,:user_role,:user_password,:user_telephone,:user_email,:user_status,:user_img) as temp
          WHERE NOT EXISTS (SELECT nom FROM users WHERE nom = :user_nom) LIMIT 1
          ";

          $statement = $connect->prepare($query);
          if ($statement->execute($data))
          {
            if ($statement->rowCount() > 0)
            {
                $output = [
                    "success" => 'Enregistrement a reussi'
                ];
            }else {
              $output = [
                   'error' => true,
                   'error_user_nom' => 'Cet enregistrement existe'
              ];
            }
          }
         }

         if ($_POST['action'] == 'Edit')
         {
            $data = [
              ':user_nom' => $user_nom,
              ':user_sexe' => $user_sexe,
              ':user_role' => $user_role,
              ':user_status' => $user_status,
              ':user_telephone' => $_POST['user_telephone'],
              ':user_email' => $_POST['user_email'],
              ':user_id' => $_POST['user_id']
            ];

            $query = 
            "
             UPDATE users SET 
             nom = :user_nom,
             sexe = :user_sexe,
             role = :user_role,
             telephone = :user_telephone,
             email = :email,
             WHERE iduser = :user_id
          ";

          $statement = $connect->prepare($query);

          if ($statement->execute($data))
          {
            $output = [
              "success" => 'user is updated successfully'
            ];
          }
         }
     }
    echo json_encode($output);
   }

   if ($_POST['action'] =='edit_fetch')
   {
      $query = "
      SELECT * FROM users WHERE iduser = '" . htmlentities($_POST['user_id']) . "'
      ";

    $statement = $connect->prepare($query);

     if ($statement->execute())
     {
        $resultat = $statement->fetchAll();
        foreach ($result as $row) 
        {
            $output['nom'] = $row['nom'];
            $output['sexe'] = $row['sexe'];
            $output['role'] = $row['role'];
            $output['telephone'] = $row['telephone'];
            $output['email'] = $row['email'];
            $output['status'] = $row['status'];
            $output['user_id'] = $row['iduser'];
        }
      }
      echo json_encode($output);
   }
 }