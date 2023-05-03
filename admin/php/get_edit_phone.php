<?php 
require_once("../SQL/sql_admin.php");

$id = $_POST['phoneID'];

// get phone 
$result_phone = mysqli_query($con, get_phone_by_id($id));
$phone = array();
if ($result_phone && mysqli_num_rows($result_phone) > 0) {
    $row = mysqli_fetch_assoc($result_phone);
    $phone = $row;
} 

// get phone spec
$result_spec = mysqli_query($con, get_phone_spec_by_id($id));
$spec = array();
if ($result_spec && mysqli_num_rows($result_spec) > 0) {
    $row = mysqli_fetch_assoc($result_spec);
    $spec = $row;
} 

// get phone variant
$result_variant = mysqli_query($con, get_phone_variant_by_id($id));
$variant = array();
while($row = mysqli_fetch_array($result_variant)){
    array_push($variant,$row);
} 

// get colors
$result_color = mysqli_query($con, get_phone_color_by_id($id));
$color = array();
while($row = mysqli_fetch_array($result_color)){
    array_push($color,$row);
} 


// get images
$result_image = mysqli_query($con, get_phone_image_by_id($id));
$image = array();
while($row = mysqli_fetch_array($result_image)){
    array_push($image,$row);
} 

$all = array("phone" => [$phone],"spec" => [$spec],"variant" => [$variant], "color" => [$color], "image" => [$image]);


// send data back to js
echo json_encode($all, JSON_UNESCAPED_UNICODE);

// echo json_encode($spec_json, JSON_UNESCAPED_UNICODE).",";

// echo json_encode($variant_json, JSON_UNESCAPED_UNICODE);

?>