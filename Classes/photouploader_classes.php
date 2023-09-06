<?php 

declare(strict_types=1);

require_once "../Classes/dbh_classes.php";

class PhotoUploader extends Dbh
{

public function uploadPhoto($file, $newFileName)
{
    if ($file['error'] !== UPLOAD_ERR_OK) {
        return false; // Handle the upload error as needed
    }

    // Check if the file type is allowed (e.g., JPEG or PNG)
    $allowedExtensions = array("jpeg", "jpg", "png");
    $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
    if (!in_array(strtolower($fileExtension), $allowedExtensions)) {
        return false; // File type not allowed
    }

    // Set the target directory where you want to store uploaded files
    $targetDir = "../uploads/";

    // Construct the target filename with the desired name
    $targetFile = $targetDir . $newFileName . "." . $fileExtension;

    // Move the uploaded file to the specified directory
    if (move_uploaded_file($file['tmp_name'], $targetFile)) {
        // File uploaded successfully, you can now insert its information into the database if needed.
        // Use the parent::connect() method to get a database connection.
        $stmt = $this->connect()->prepare('INSERT INTO users (image_path) VALUES (?);');
        $stmt->execute(array($targetFile));
        return true;
    } else {
        return false; // Error uploading the file
    }
}
}
?>