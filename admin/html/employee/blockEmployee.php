<?php 
  include('../../SQL/connection.php');
  $sql_lietke_order = "SELECT * FROM employee";
  $query_lietke_order = mysqli_query($con ,$sql_lietke_order);

  $email = $_GET['email'];

    $sql = "UPDATE employee SET `block`= 1 WHERE email = '$email' ";
    $query = mysqli_query($con , $sql);
    header("location: /admin/html/employee/employee.php");
?>
