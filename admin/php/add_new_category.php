<?php 
require_once("../SQL/sql_admin.php");

$brand = $_POST['brand'];
$table = " category ";
$brand_data = array(
    "name" => $brand,
);
$result = mysqli_query($con, insert($table,$brand_data));
if(!$result){
    die('Error: ' . mysqli_error($con));
}

?>