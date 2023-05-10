<?php
    require('../SQL/connection.php');

    if(isset($_GET["id"])) {
        $id = $_GET["id"];

        $sql = "DELETE FROM supplier WHERE id=$id";
        $query = mysqli_query($con , $sql);
        header("location: /admin/html/supplier.php");
    }
?>