<?php 
    require_once("../html/template/connection.php"); 
    require("../SQL/sql.php");
    
    if(isset($_POST['submit'])){
        // if item is invisible 0
        // set item into visible 1
        // mysqli_query($con,set_visible($_GET["phoneID"],1));
        echo $_POST['file'];
    }
    //header("Location: ../html/all_phone.php");
?>