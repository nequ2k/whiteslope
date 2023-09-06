<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header("location: ../Views/mainpage.php");
}

require_once "../Classes/photouploader_classes.php"; 


$upload = new PhotoUploader(); 

if (isset($_POST['upload'])) {
    if ($upload->uploadPhoto($_FILES['photo'], $_SESSION['userid'])) {
        echo "File uploaded successfully!";
        header("location: ../Views/current_user.php");
        exit(); 
    } else {
        header("location: ../Views/current_user.php?message=uploaderror"); 
        exit(); 
    }
}

?>