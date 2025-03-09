<?php

$db_host = "localhost";
$db_user = "root";
$db_password = "";

$conn = mysqli_connect($db_host, $db_user, $db_password);

// if (mysqli_connect_errno()) {
//     echo "Failed to connect to MySQL: " . mysqli_connect_error();
//     exit();
// } else {
//     echo "Database connection successful! <br>";
// }