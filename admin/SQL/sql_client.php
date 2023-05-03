<?php 
function get_all_email_customer() {
    $query = "SELECT email FROM customer";
    return $query;
}

function get_all_account_customer() {
    $query = "SELECT email,password FROM customer";
    return $query;
}

function get_all_email_employee() {
    $query = "SELECT email FROM employee";
    return $query;
}

function get_all_account_employee() {
    $query = "SELECT email,password FROM employee";
    return $query;
}

?>