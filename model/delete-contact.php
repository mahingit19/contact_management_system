<?php 

require "../db/db-conn.php";
require "../db/db-name.php";
require "../db/db-select.php";

if (isset($_POST["id"])) {
    $id = $_POST["id"];

    $sql = "DELETE FROM contacts WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "ID: $id deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

}