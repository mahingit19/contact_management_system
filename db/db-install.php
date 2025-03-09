<?php

require ("db-conn.php");
require ("db-name.php");

$sql = "CREATE DATABASE IF NOT EXISTS $db_name";
$result = mysqli_query($conn, $sql);

// if ($result) {
//     echo "Database created successfully! <br>";
// } else {
//     echo "<br> Error creating database: " . mysqli_error($db_conn) . "<br>";
// }

require ("db-select.php");

$sql = "CREATE TABLE IF NOT EXISTS contacts (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(30) NOT NULL,
    last_name VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    phone VARCHAR(15),
    address VARCHAR(50),
    city VARCHAR(30),
    state VARCHAR(30),
    zip VARCHAR(10),
    country VARCHAR(30),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);";
$sql .= "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(30) NOT NULL,
    password TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)"; 
$result = mysqli_multi_query($conn, $sql);

// if ($result) {
//     echo "Table created successfully! <br>";
// } else {
//     echo "Error creating table: " . mysqli_error($conn) . "<br>";
// }

require ("db-close.php");