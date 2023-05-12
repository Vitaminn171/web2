<?php 
require_once("../../SQL/sql_admin.php");
$brand = $_POST['brand'];
$id = $_POST['id'];
$table = " category ";
$brand_data = array(
    "name" => $brand,
);
$condition = "id = " . $id ;
$result = mysqli_query($con, update($table,$brand_data,$condition));
if(!$result){
    die('Error: ' . mysqli_error($con));
}

?>