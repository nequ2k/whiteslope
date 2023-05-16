<?php


if (isset($_POST["submit"])) {
    // Grabbing the data
    $user_name = (string)$_POST["login"];
    $password = (string)$_POST["password"];
    // Instantiate SignUpContr class
    include "../classes/dbh_classes.php";
    include "../classes/login_classes.php";
    include "../classes/login_controller_classes.php";

    $login = new LoginController($user_name, $password);

    // Running error handlers
    $login->loginUser();

    // Going back to page
    header("location: ../Views/mainpage.php");
}
?>