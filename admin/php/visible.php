<?php 
    require_once("../html/template/connection.php"); 
    require("../SQL/sql.php");
    if($_GET["visible"] == 0){
        // if item is invisible 0
        // set item into visible 1
        mysqli_query($con,set_visible($_GET["phoneID"],1));
    }else if($_GET["visible"] == 1){
        // if item is invisible 1
        // set item into visible 0
        mysqli_query($con,set_visible($_GET["phoneID"],0));
    }
    header("Location: ../html/all_phone.php");
?>