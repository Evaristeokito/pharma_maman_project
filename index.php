<?php
include dirname(__FILE__) . './plugins/alto/altorouter/AltoRouter.php';

   $router = new AltoRouter();
   $router->setBasePath('');

//Main routes Admin

$router->map('GET', '/' ,'./views/dashboard.php' , 'dashboard');
$router->map('GET', '/produit' , './views/product.php','produit');
$router->map('GET', '/listeproduit' , './views/product_list.php','listeproduit');
$router->map('GET', '/product_available' , './views/product_available.php','free_product');
$router->map('GET', '/produit-minimal' , './views/product_minimal.php','produit-minimal');
$router->map('GET', '/expiration' , './views/product_expiration.php','expiration');
$router->map('GET', '/vente' , './views/vente_product.php','vente');
$router->map('GET', '/vente-liste' , './views/vente_product_list.php','vente-liste');
$router->map('GET', '/commande' , './views/product_add_command.php','commande');
$router->map('GET' , '/mes-commandes' , './views/product_commande.php' , 'mes-commandes');
$router->map('GET','/famille', './views/famille.php' , 'famille');
$router->map('GET','/format', './views/format.php' , 'format');
$router->map('GET','/client', './views/client.php' , 'client');
$router->map('GET' , '/fournisseur' , './views/fournisseur.php' , 'fournisseur');
$router->map('GET' , '/mes-livraisons' , './views/listelivraison.php' , 'mes-livraisons');
$router->map('GET' , '/livraison' , './views/product_livraison.php' , 'livraison');
$router->map('GET' , '/login' , './views/login.php' , 'login');
$router->map('GET' , '/utilisateurs' , './views/utilisateurs.php' , 'utilisateurs');
$router->map('GET' , '/profil' , './views/profil.php' , 'profil');
$router->map('GET' , '/deconnection' , './views/logout.php' , 'logout');

// MAIN USERS INTERFACE

$router->map('GET' , '/userlogin' , './users/views/userlogin.php' . 'userLogin');


$match = $router->match();
if($match){
    require $match['target'];
}else {
    header("HTTP/1.0 404 Not found");
    require './views/404.php';
}

?>