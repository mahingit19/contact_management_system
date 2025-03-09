<?php

require "../db/db-conn.php";
require "../db/db-name.php";
require "../db/db-select.php";
require "default.php";

$hashed_pass = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (email, password) VALUES ('$email', '$hashed_pass')";
$result = mysqli_query( $conn, $sql );

if ($result) {
    echo "Default user created successfully!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error( $conn );
}