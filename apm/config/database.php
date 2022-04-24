<?php
//defining database parameters
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','skytech_store');

//connecting
$con=new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

//checking connection
if($con->connect_error){
    die('Connection failed..');
}
?>
