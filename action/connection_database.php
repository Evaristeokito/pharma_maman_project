<?php
session_start();
   
define('HOST' , 'mysql:host=localhost;dbname=pharmacie_dbs_admin');
define('USER' , 'root');
define('PASSWORD' ,'evaristeokito');

try {
   $connect = new PDO(HOST,USER,PASSWORD,[
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
}
catch (PDOException $e)
{
    echo "Échec lors de la connexion : " . $e->getMessage();
}

function get_total_records ($connect,$table) {
    $query = "SELECT * FROM $table";
    $statement = $connect->prepare($query);
    $statement->execute();
    return $statement->rowCount();
}


$base_url = "http://localhost/pharma/login";


