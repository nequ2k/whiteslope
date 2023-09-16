<?php
session_start();
require_once '../Classes/recipe_details_classes.php';

if (isset($_POST["add_favourites_button"])) {
    $id=$_POST["secretid"];
    $user=$_POST["secretuser"];
    //echo "id".$id;
    //echo "user".$user;
    Recipe_details::addFavourites((int)$id, (int)$user);
    // Going back to page
    header("location: ../Views/current_user_favourites.php");
}
?>
