<?php 
    require("../SQL/sql_admin.php");
    $result = mysqli_query($con,get_total_payment_order());
    $data = array();
    if (!$result) {
        die('Error: ' . mysqli_error($con));
    } 
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $data = $row;
    } 

    $result_brand = mysqli_query($con, get_total_payment_brand_order());
    $brand = array();
    while($row = mysqli_fetch_array($result_brand)){
        array_push($brand,$row);
    } 


    $all = array("data_total" => [$data],"brand" => [$brand]);


    // send data back to js
    echo json_encode($all, JSON_UNESCAPED_UNICODE);
    
?>