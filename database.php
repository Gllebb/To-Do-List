<?php
    $hostName = "localhost";
    $dbUser = "root";
    $dbPassword = "";
    $dbName = "login_register";
    $conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName, 3306);

    if (!$conn){
        die("Could not connect to database");
    }
?>
