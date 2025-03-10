<?php
if (isset($_FILES['fileToUpload'])) {

    if (!empty($_FILES['fileToUpload']['name'])) {
        $sql = "SELECT photo FROM contacts WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $oldPhoto = $row['photo'];
            if ($oldPhoto) {
                unlink($oldPhoto);
            }
        }
    }

    $image = $_FILES['fileToUpload'];
    $imageName = $image['name'];
    $imageTmpName = $image['tmp_name'];
    $imageError = $image['error'];

    // Define the upload directory
    $uploadDirectory = "uploads/";

    // Generate a unique filename to prevent overwriting
    $uniqueFileName = uniqid('', true) . "_" . basename($imageName);
    $uploadPath = $uploadDirectory . $uniqueFileName;

    // Check for upload errors
    if ($imageError === 0) {
        // Create the uploads directory if it doesn't exist
        if (!is_dir($uploadDirectory)) {
            mkdir($uploadDirectory, 0777, true);
        }

        // Move the file to the upload directory
        move_uploaded_file($imageTmpName, $uploadPath);

        $sql = "UPDATE contacts SET photo='$uploadPath' WHERE id=$id";
        $result = mysqli_query($conn, $sql);
    } 

}