<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../class/produit.php';


$con=new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
$db = $con;
function read_items($db)
{
    $items = new produit($db);

    $stmt = $items->getproduits();


    $produitArr = array();
    $produitArr["body"] = array();
    $id_produit = 0;
    $lib_produit = '';
    $prix_produit = 0;
    $description = '';
    $img_produit = '';
    $id_cat = '';
    $mail_admin = '';
    $produitArr = [];
    $stmt->bind_result($id_produit, $lib_produit, $prix_produit, $img_produit, $id_cat, $description, $mail_admin);
    while ($stmt->fetch()) {


        $e = array(
            "id_produit" => $id_produit,
            "lib_produit" => $lib_produit,
            "prix_produit" => $prix_produit,
            "img_produit" => $img_produit,
            "id_cat" => $id_cat,
            "description" => $description,
            "mail_admin" => $mail_admin,

        );
        array_push($produitArr, $e);
    }
    return $produitArr;

}
$res=read_items($con);
print_r(json_encode($res));



?>