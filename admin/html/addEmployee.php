<?php
    require('../SQL/connection.php');

    if(isset($_POST["themEmployee"])) {
        $name = $_POST["employee-name"];
        $email = $_POST["employee-email"];
        $phoneNumber = $_POST["employee-phoneNumber"];
        $position = $_POST["employee-position"];
        $password = $_POST["employee-password"];
        $block = 0;

        if($position != "" && $name != "" && $email != "" && $phoneNumber != "" && $block != "" && $password != "") {
            $sql = "INSERT INTO employee(`name`,email,phoneNumber,position,`password`,`block`) VALUES('$name','$email','$phoneNumber','$position',md5('$password'),'$block')";
            $query = mysqli_query($con , $sql);
            header("location: /admin/html/employee.php");
        }
    }
?>