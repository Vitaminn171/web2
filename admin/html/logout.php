<?php 
    session_start();
    unset($_SESSION['useremail']);
    header("Location: /admin/html/auth-login-basic.php")
?>