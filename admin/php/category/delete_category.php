<?php 
require_once("../../SQL/sql_admin.php");
    $id = $_GET["brandID"];
    $quantity = $_GET["quantity"];
    if($quantity == 0){
        $result1 = mysqli_query($con, delete_data(" category "," id = ".$id));
        if (!$result1) {
            die('Error: ' . mysqli_error($con));
        }
        $message = urlencode("Delete brand success!");
        header("Location: ../../html/category/category.php?message=".$message);
    }else{
        $message = urlencode("Can't delete brand!");
        header("Location: ../../html/category/category.php?message=".$message);
    }


    //header("Location: ../html/all_phone.php");
?>