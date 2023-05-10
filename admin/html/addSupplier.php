<?php
    require('../SQL/connection.php');

    if(isset($_POST["them"])) {
        $id = $_POST["sup-id"];
        $name = $_POST["sup-name"];
        $email = $_POST["sup-email"];
        $phoneNumber = $_POST["sup-phoneNumber"];

        if($id != "" && $name != "" && $email != "" && $phoneNumber != "") {
            $sql = "INSERT INTO supplier(id,`name`,email,phoneNumber) VALUES('$id','$name','$email','$phoneNumber')";
            $query = mysqli_query($con , $sql);
            header("location: /admin/html/supplier.php");
        }
    }
?>