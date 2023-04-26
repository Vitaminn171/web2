<?php 
    require_once("../html/template/connection.php"); 
    require("../SQL/sql.php");
    
    
    // $date = str_replace('/', '-', $_POST["date"]);
    // $new_date = date('Y-m-d', strtotime($date));
    // echo $new_date;
    
    // $dataColor = json_decode($_POST['data'], true);
    // foreach ($dataColor as $item) {
    //     $colorname = $item['color'];
    //     $colorID = $item['colorID'];
    //     echo $colorname;
    // }


    // for($i = 0;$i < sizeof($_POST["dataColor"]); $i++){
    //     echo $_POST["dataColor"][$i]["color"]; //get array from post 
    // }



    
        //mysqli_query($con,insert_phone($_POST["name"],$_POST["category"],$new_date));
         
    // }
    // $jsonSpec = $_POST['spec'];
    // $spec = json_decode($jsonSpec, true);
    
    // if ($spec == null && json_last_error() !== JSON_ERROR_NONE) {
    //     echo json_last_error();
    // }
    // else {
    //     $chipset = $spec['chipset'];
    //     // Xử lý dữ liệu
    // }
    
    var_dump($_POST)
    
    

?>