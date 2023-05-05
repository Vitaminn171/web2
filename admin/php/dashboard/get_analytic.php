<?php 
require_once("../../SQL/sql_admin.php");
    $result = mysqli_query($con,get_total_payment_order());
    $data = array();

    $result_order = mysqli_query($con,get_total_order());
    if ($result && mysqli_num_rows($result_order) > 0 && $result && mysqli_num_rows($result) > 0) {
        $row_order = mysqli_fetch_assoc($result_order);
        $row = mysqli_fetch_assoc($result);
        $data = array($row, $row_order);
        
    } 

    $result_brand = mysqli_query($con, get_total_payment_brand_order());
    $brand = array();
    while($row = mysqli_fetch_array($result_brand)){
        array_push($brand,$row);
    } 
    $year = 2023;
    $result_order_month = mysqli_query($con, get_total_order_month($year));
    $month = array();
    while($row = mysqli_fetch_array($result_order_month)){
        array_push($month,$row);
    } 


    $all = array("data_total" => [$data],"brand" => [$brand], "month" => [$month], "year" => $year);


    // send data back to js
    echo json_encode($all, JSON_UNESCAPED_UNICODE);
    
?>