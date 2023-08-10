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
                    <p>User123#1</p>
                </div>
                <div class="author_div">
                    <i class="fa-solid fa-note-sticky"></i>
                    <p><?php echo $recipe->getCategory()?></p>
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

                    if($recipe->getLikesHot()) echo "<i class='fa-solid fa-pepper-hot' style='color: #ff2600;'></i>";
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
            </div>
            <div class="preparing_method">
                <h2>Preparing method: </h2>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </div>
        </div>

    </main>
