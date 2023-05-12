<?php 
require_once("../../SQL/sql_admin.php");    
    $id = $_GET["phoneID"];
    $result = mysqli_query($con, get_variant_in_orderDetail($id));
    if($result && mysqli_num_rows($result) > 0){
        $message = urlencode("Can't delete product!");
        header("Location: ../../html/phone/all_phone.php?message=".$message);

    }else{
        $result1 = mysqli_query($con, delete_data(" spec "," phoneID = ".$id));
        if (!$result1) {
            die('Error: ' . mysqli_error($con));
        }

        $result2 = mysqli_query($con, delete_data(" variant "," phoneID = ".$id));
        if (!$result2) {
            die('Error: ' . mysqli_error($con));
        }

        $result3 = mysqli_query($con, delete_data(" color "," phoneID = ".$id));
        if (!$result3) {
            die('Error: ' . mysqli_error($con));
        }

        $result4 = mysqli_query($con, delete_data(" image "," phoneID = ".$id));
        if (!$result4) {
            die('Error: ' . mysqli_error($con));
        }
        $result = mysqli_query($con, delete_data(" phone "," id = ".$id));
        if (!$result) {
            die('Error: ' . mysqli_error($con));
        }
        $message = urlencode("Delete success!");
        header("Location: ../../html/phone/all_phone.php?message=".$message);
       
    }

    //header("Location: ../html/all_phone.php");
?>