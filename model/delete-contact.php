<?php 

require "../db/db-conn.php";
require "../db/db-name.php";
require "../db/db-select.php";

if (isset($_POST["id"])) {
    $id = $_POST["id"];

    $sql = "SELECT photo FROM contacts WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $photoPath = $row["photo"];
        if (file_exists($photoPath)) {
            unlink($photoPath);
        }
    }

    $sql = "DELETE FROM contacts WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "ID: $id deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

}

require "../db/db-close.php";