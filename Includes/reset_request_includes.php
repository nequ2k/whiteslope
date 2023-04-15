<?php
include '../Classes/reset_password_classes.php';
if(isset($_POST['reset-submit']))
{
    $reset_request = new ResetPassword($_POST['email']);
    $reset_request->resetPasswordRequest();
}
else header("Location: ../Views/login.php");

