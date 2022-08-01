<?php 

   if (isset($_SESSION['user_id']))
    {
      $query = "SELECT * from users WHERE iduser = :user_id";
      $stmt = $connect->prepare($query);
      $stmt->execute([
        "user_id" => $_SESSION['user_id']
      ]);

      $resultat = $stmt->fetch();
    }
?>