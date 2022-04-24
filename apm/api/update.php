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
$res=['status'=>'failed'];
$item = new produit($con);
$lib_produit= isset($_GET['lib_produit']) ? $_GET['lib_produit'] : die();
$prix_produit= isset($_GET['prix_produit']) ? $_GET['prix_produit'] : die();
$img_produit=isset($_GET['img_produit']) ? $_GET['img_produit'] : die();
$id_cat=isset($_GET['id_cat']) ? $_GET['id_cat'] : die();
$description=isset($_GET['description']) ? $_GET['description'] : die();
$mail_admin= isset($_GET['mail_admin']) ? $_GET['mail_admin'] : die();
$id_produit= isset($_GET['id_produit']) ? $_GET['id_produit'] : die();
$item->lib_produit = $lib_produit;
$item->prix_produit = $prix_produit;
$item->description = $description;
$item->img_produit = $img_produit;
$item->id_cat = $id_cat;
$item->mail_admin = $mail_admin;
$item->id_produit = $id_produit;

$res=[];
$res=$item->updateproduit();
print_r(json_encode($res));

?>

