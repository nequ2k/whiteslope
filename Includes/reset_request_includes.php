<?php
include '../Classes/reset_password_request_classes.php';
if(isset($_POST['reset-submit']))
{
    $reset_request = new ResetPasswordRequest($_POST['email']);
    $reset_request->resetPasswordRequest();
}
else header("Location: ../Views/login.php");

