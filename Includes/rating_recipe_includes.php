<?php
if(isset($_POST['rating_recipe_submit'])){
    require_once "../Classes/recipe_details_classes.php";
    Recipe_details::rateRecipe((int)$_POST['hidden_rating_user_id'], (int)$_POST['hidden_recipe_id'] ,(float)$_POST['rating']);
}
header("location: ../Views/mainpage.php");
