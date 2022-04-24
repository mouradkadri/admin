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
function deleteproduit($con){
    $res=array('status'=>'failed');

    $id_produit=isset($_GET['id_produit']) ? $_GET['id_produit'] : die();
    $sql="delete from produit where id_produit={$id_produit}";
    if(mysqli_query($con,$sql)){
        $res=array('status'=>'succes');
    }
    return $res;
}
$res=deleteproduit($con);
print_r(json_encode($res));
?>