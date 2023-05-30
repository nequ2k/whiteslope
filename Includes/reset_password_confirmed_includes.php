<?php
include '../Classes/reset_password_classes.php';
if(isset($_POST['submit-new-password']))
{
    if($_POST['newPassword'] === $_POST['newPasswordRepeat']) {
        $reset_request = new ResetPassword($_POST['token'], $_POST['newPassword']);
        $reset_request->resetPassword();
    }
    else
        header("location: ../Views/create_new_password.php?message=pass!match");
}
else header("Location: ../Views/login.php");