<?php 
require_once("../SQL/sql_admin.php");



$result = mysqli_query($con, get_all_category_1());
$brand = array();
while($row = mysqli_fetch_array($result)){
    array_push($brand,$row);
} 
if(isset($_POST['brandID'])){
    $result = mysqli_query($con, get_category_by_id($_POST['brandID']));
    $data = array();
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $data = $row;
    } 
    $all = array("brand" => [$brand], "name" => [$data]);
    echo json_encode($all, JSON_UNESCAPED_UNICODE);
}else{
    $all = array("brand" => [$brand]);
    // send data back to js
    echo json_encode($all, JSON_UNESCAPED_UNICODE);
}


?>