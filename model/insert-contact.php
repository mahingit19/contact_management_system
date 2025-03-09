<?php
require "../db/db-conn.php";
require "../db/db-name.php";
require "../db/db-select.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Prepare and sanitize input data
    $firstName = $conn->real_escape_string($_POST['firstName']);
    $lastName = $conn->real_escape_string($_POST['lastName']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $address = $conn->real_escape_string($_POST['address']);
    $city = $conn->real_escape_string($_POST['city']);
    $state = $conn->real_escape_string($_POST['state']);
    $zip = $conn->real_escape_string($_POST['zip']);
    $country = $conn->real_escape_string($_POST['country']);

    // SQL insert query
    $sql = "INSERT INTO contacts (first_name, last_name, email, phone, address, city, state, zip, country)
            VALUES ('$firstName', '$lastName', '$email', '$phone', '$address', '$city', '$state', '$zip', '$country')";

    // Execute query and check for success
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
