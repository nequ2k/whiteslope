<?php

if(isset($_POST['submit']))
{
    echo "?";
    // Grabbing the data
    $email = (string)$_POST["email"];
    $user_name = (string)$_POST["login"];
    $password = (string)$_POST["password"];
    $confirm_password = (string)$_POST["confirm_password"];
    echo "?";
    // Instantiate SignUpContr class
    include "../classes/dbh_classes.php";
    include "../classes/signup_classes.php";
    include "../classes/signup_controller_classes.php";

    $signup = new SignUpController($email, $user_name, $password, $confirm_password);
    echo "?";
    // Running error handlers
    $signup->signUpUser();
    echo "?";

    // Going back to page
    header("Location: ../Views/registration_successful.php");
    echo "?";


}

?>