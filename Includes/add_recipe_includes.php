<?php
session_start();
require_once '../Classes/recipe_classes.php';

if (isset($_POST["add_recipe_button"])) {

    $title = $_POST['titleOfRecipe'];
    //here should be category_id
    if(isset($_POST['isVegan'])) $isVegan = 1;
    else $isVegan = 0;
    if(isset($_POST['isSpicy'])) $isSpicy = 1;
    else $isSpicy = 0;
    $time = $_POST['time'];

    $ingredients = $_POST['ingredient'];

    $user_id = $_SESSION['userid'];
    $methodOfPrep = $_POST['methodOfPrep'];

    $recipe = new Recipe($title, array('italian', 'spanish', 'american'), $isVegan, $isSpicy, (int)$time, $ingredients, $user_id, $methodOfPrep);

    // Running error handlers
    Recipe::addRecipe($recipe);

    // Going back to page
    header("location: ../Views/my_recipes.php");
}
?>