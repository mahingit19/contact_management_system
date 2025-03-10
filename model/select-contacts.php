<?php

require "../db/db-conn.php";
require "../db/db-name.php";
require "../db/db-select.php";

$sql = "SELECT * FROM contacts";
$result = mysqli_query($conn, $sql);

$data = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}
echo json_encode($data);

require "../db/db-close.php";