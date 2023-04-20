<?php 
    require_once("../html/template/connection.php"); 
    require("../SQL/sql.php");
    
    // if(isset($_POST['submit'])){
    //     // if item is invisible 0
    //     // set item into visible 1
    $date = str_replace('/', '-', $_POST["date"]);
    $new_date = date('Y-m-d', strtotime($date));
    echo $_POST["spec"]["chipset"];
    




    // for($i = 0;$i < sizeof($_POST["dataColor"]); $i++){
    //     //get array from post $_POST["dataColor"][$i]["color"]
    // }



    
        //mysqli_query($con,insert_phone($_POST["name"],$_POST["category"],$new_date));
         
    // }

?>