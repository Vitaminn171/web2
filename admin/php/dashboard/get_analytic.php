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

    $result_top_sold = mysqli_query($con, get_top_sold_product(5));
    $top_sold = array();
    while($row = mysqli_fetch_array($result_top_sold)){
        array_push($top_sold,$row);
    } 

    $result_count_customer = mysqli_query($con,count_data("customer","id"));
    $result_count_employee = mysqli_query($con,count_data("employee","email"));
    $result_count_product = mysqli_query($con,count_data("phone","id"));
    
    if ($result_count_customer && mysqli_num_rows($result_count_customer) > 0 &&
        $result_count_employee && mysqli_num_rows($result_count_employee) > 0 &&
        $result_count_product && mysqli_num_rows($result_count_product) > 0) {

        $row_customer = mysqli_fetch_assoc($result_count_customer);
        $row_employee = mysqli_fetch_assoc($result_count_employee);
        $row_product = mysqli_fetch_assoc($result_count_product);

        $data_count = array(["customer" => $row_customer['total'],
                        "employee" => $row_employee['total'],
                        "product" => $row_product['total']]);
        $all = array("data_total" => [$data],"brand" => [$brand], "month" => [$month], "year" => $year, "data_count" => $data_count, "top_sold" => $top_sold);


        // send data back to js
        echo json_encode($all, JSON_UNESCAPED_UNICODE);
    } 
    

   
    
?>