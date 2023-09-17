<?php
session_start();
require_once '../Classes/recipe_details_classes.php';

if (isset($_POST["recipe_fav_remove"])) {
    $id=$_POST["secretid"];

    Recipe_details::removeFavourites((int)$id);
    // Going back to page
    header("location: ../Views/current_user_favourites.php");
}
?>
