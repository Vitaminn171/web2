<?php 
require_once("../html/template/connection.php"); 
require("../SQL/sql_admin.php");
$id = 0;
    $result = mysqli_query($con, get_latest_phone_id());
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $id = intval($row['id']);
        $id += 1;
    } 

$data = array('id' => $id);
echo json_encode($data);
?>