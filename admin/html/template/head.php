<?php

$con=mysqli_connect("localhost:3307","root","","phone_web_db");
                // Check connection
                if (mysqli_connect_errno())
                {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }
?>