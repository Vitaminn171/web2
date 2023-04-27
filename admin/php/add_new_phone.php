
<?php 
    require_once("../html/template/connection.php"); 
    require("../SQL/sql_admin.php");

    $name = $_POST['phone']['name'];
    $brand = $_POST['phone']['brand'];

    $date = str_replace('/', '-', $_POST['phone']["date"]);
    $new_date = date('Y-m-d', strtotime($date));


    // get latest id
    $id = 0;
    $result = mysqli_query($con, get_latest_phone_id());
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $id = intval($row['id']);
        $id += 1;
    } 

    if($id != 0){
        
    }
    //mysqli_query($con,insert_phone($id,$name,$brand,$new_date));// insert to phone table

    // foreach ($_POST['dataColor'] as $item_color){

    //     foreach ($_POST['dataVariant'] as $item_variant){

    //         foreach ()
    //     }
    // }
    

    
?>