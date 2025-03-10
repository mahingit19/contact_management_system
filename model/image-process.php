<?php
if (isset($_FILES['fileToUpload'])) {
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
    } 

}
else {
    $uploadPath = "";
}