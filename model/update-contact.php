<?php

require "../db/db-conn.php";
require "../db/db-name.php";
require "../db/db-select.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $country = $_POST['country'];

    include "image-update.php";

    // Update query
    $sql = "UPDATE contacts SET 
                first_name='$firstName', last_name='$lastName', email='$email', phone='$phone',
                address='$address', city='$city', state='$state', zip='$zip', country='$country'
            WHERE id=$id";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Record updated successfully for id: $id";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}


require "../db/db-close.php";
