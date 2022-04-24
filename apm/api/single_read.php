<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../config/database.php';
include_once '../class/produit.php';
$con=new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
$db = $con;
$item = new produit($db);
$item->id_produit = isset($_GET['id_produit']) ? $_GET['id_produit'] : die();
$item->getSingleproduit();
if($item->lib_produit != null){
    // create array
    $produitarr = array(
        "id_produit" =>  $item->id_produit,
        "lib_produit" => $item->lib_produit,
        "prix_produit" => $item->prix_produit,
        "description" => $item->description,
        "img_produit" => $item->img_produit,
        "id_cat" => $item->id_cat
    );

    http_response_code(200);
    echo json_encode($produitarr);
}

else{
    http_response_code(404);
    echo json_encode("product not found.");
}
?>