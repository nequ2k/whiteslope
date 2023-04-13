<?php

if(isset($_POST["submit"]))
{
    // Grabbing the data
    $email = (string)$_POST["email"];
    $user_name = (string)$_POST["login"];
    $password = (string)$_POST["password"];
    $confirm_password = (string)$_POST["confirm_password"];
    // Instantiate SignUpContr class
    include "../classes/dbh_classes.php";
    include "../classes/signup_classes.php";
    include "../classes/signup_controller_classes.php";

    $signup = new SignUpController($email, $user_name, $password, $confirm_password);

    // Running error handlers
    $signup->signUpUser();

    // Going back to page
    header("location: ../Views/registration_successful.php");


}
