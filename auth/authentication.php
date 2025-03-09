<?php

require "../db/db-conn.php";
require "../db/db-name.php";
require "../db/db-select.php";

 // Send JSON response
 header('Content-Type: application/json');

if (isset($_POST["email"]) && isset($_POST["password"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            session_start();
            $_SESSION["email"] = $email;
            $_SESSION["password"] = $password;
            echo json_encode(['status' => 'success']);
        } else {

            echo json_encode(['status' => 'error', 'message' => 'Invalid email or password']);
        }
        exit;
    } else {

        echo json_encode(['status' => 'error', 'message' => 'Invalid email or password']);
        exit;
    }
}


