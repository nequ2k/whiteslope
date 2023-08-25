<?php session_start(); ?>
<?php require "header.php" ?>
<?php require "nav.php" ?>

<?php require_once '../Classes/recipe_details_classes.php'; ?>
<?php require_once '../Classes/recipe_classes.php';?>



<link rel="stylesheet" href="CSS/recipe_details.css">
    <main>
        <div class="top_div">
            <div class="left">
                <div class="h1_div">
                    <?php $recipe = Recipe_details::getRecipe($_POST['hidden_title'], $_POST['hidden_user_id']);?>
                    <h1><?php echo $recipe->getTitle()?>&nbsp;&nbsp;&nbsp;
                        <i class="fa-regular fa-heart"></i>
<!--                        <i class="fa-solid fa-heart" style="color: #ff0000;"></i>-->
                    </h1>
                </div>
                <div class="author_div">
                    <img src="Images/banner.jpg">
                    <p><?php echo $recipe->getUsername()?></p>
                </div>
                <div class="author_div">
                    <i class="fa-solid fa-note-sticky"></i>
                    <p><?php echo $recipe->getCategoriesAsString()?></p>
                </div>
                <div class="author_div">
                    <i class="fa-solid fa-clock"></i>
                    <p><?php echo $recipe->getTime()?></p>
                </div>
                <div class="author_div">
                    <i class="fa-solid fa-star" style="color: #ffea00;"></i>
                    <p>4.5</p>
                </div>
                <div class="author_div">
                    <?php

                    if($recipe->getIsVegan()) echo "<i class='fa-solid fa-seedling' style='color: #42f410;'></i>";
                    else echo "<i class='fa-solid fa-seedling' style='color: #000000;'></i>";

                    if($recipe->getIsSpicy()) echo "<i class='fa-solid fa-pepper-hot' style='color: #ff2600;'></i>";
                    else echo "<i class='fa-solid fa-pepper-hot' style='color: #000000;'></i>";

                    ?>
                </div>
            </div>
            <img src="Images/spaghetti_test.png">
        </div>
        <div class="bottom_div">
            <div class="ingredients">
                <h2>Ingredients: </h2>
                <table>
                    <?php
                        $ingredients = $recipe->getIngredients();
                        foreach  ($ingredients as $ingredient){
                            echo "
                                <tr>
                            <td><i class='fa-solid fa-diamond'></i> $ingredient</td>
                            <td>2 spoons</td>
                            </tr>";
                        } ?>
                </table>
                <form class="shopping_list_add" action="shopping_list.php" method="post">
                    <input type="hidden" name="hidden_title" value="<?php echo $recipe->getTitle()?>">
                    <input type="hidden" name="hidden_user_id" value="<?php echo $recipe->getUserId()?>">
                    <button name="shopping_list_button" type="submit">Add ingredients to shopping list</button>
                </form>
            </div>
            <div class="preparing_method">
                <h2>Preparing method: </h2>
                <?php echo $recipe->getMethodOfPrep()?>
            </div>
        </div>


    </main>
