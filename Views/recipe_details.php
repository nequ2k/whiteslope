<?php session_start(); ?>
<?php require "nav.php" ?>

<?php require_once '../Classes/recipe_details_classes.php'; ?>
<?php require_once '../Classes/recipe_classes.php'; ?>
<?php require_once '../Classes/user_classes.php'; ?>


<main class="loggedIn recipe_details">
    <?php $recipe = Recipe_details::getRecipe($_POST['hidden_title'], $_POST['hidden_user_id']); ?>

    <div class="recipe--img">
        <img src="Images/spaghetti_test.png">
        <form method="post" action="../Includes/favourite_includes.php" class="add-to-favourites">
            <input type="hidden" name="secretid" value="<?php echo Recipe::getRecipeIdFromDataBase($recipe->getTitle())?>">
            <input type="hidden" name="secretuser" value="<?php echo User::getUserIdByUsername($_SESSION['user_name'])?>">
            <button name="add_favourites_button" type="submit">
                <i class="fa-regular fa-heart<?php //if added to favourites give here classes 'fas fa-heart red' on else 'fa-regular fa-heart'
                                                ?>"></i>
            </button>
        </form>
    </div>
    <h1 class="recipe--title">
        <?php echo $recipe->getTitle() ?>&nbsp;&nbsp;&nbsp;
    </h1>
    <div class="recipe--data">
        <img src="Images/banner.jpg">
        <p><?php echo $recipe->getUsername() ?></p>
    </div>
    <div class="recipe--data">
        <i class="fa-solid fa-note-sticky"></i>
        <p><?php echo $recipe->getCategoriesAsString() ?></p>
    </div>
    <div class="recipe--data">
        <i class="fa-solid fa-clock"></i>
        <p><?php echo $recipe->getTime() ?> minutes</p>
    </div>
    <div class="recipe--data">
        <i class="fa-solid fa-star" style="color: #ffea00;"></i>
        <p>4.5</p>
    </div>
    <div class="recipe--data">
        <?php

        if ($recipe->getIsVegan()) echo "<i class='fa-solid fa-seedling' style='color: #42f410;'></i>";
        else echo "<i class='fa-solid fa-seedling' style='color: #000000;'></i>";

        if ($recipe->getIsSpicy()) echo "<i class='fa-solid fa-pepper-hot' style='color: #ff2600;'></i>";
        else echo "<i class='fa-solid fa-pepper-hot' style='color: #000000;'></i>";

        ?>
    </div>
    <div class="recipe--ingredients">
        <h2>Ingredients: </h2>
        <table>
            <?php
            $ingredients = $recipe->getIngredients();
            foreach ($ingredients as $ingredient) {
                echo "
                    <tr>
                    <td><i class='fa-solid fa-diamond'></i> $ingredient</td>
                    <td>2 spoons</td>
                    </tr>";
            } ?>
        </table>
        <form class="shopping_list_add" action="shopping_list.php" method="post">
            <input type="hidden" name="hidden_title" value="<?php echo $recipe->getTitle() ?>">
            <input type="hidden" name="hidden_user_id" value="<?php echo $recipe->getUserId() ?>">
            <button name="shopping_list_button" type="submit" class="btn-primary">Add ingredients to shopping
                list</button>
        </form>
    </div>
    <div class="recipe--preparing_method">
        <h2>Preparing method: </h2>
        <?php echo $recipe->getMethodOfPrep() ?>
    </div>

    <!-- Add function that matches other recipes with currently showed one -->
    <section class="recipes_list">
        <h2>You might like...</h2>

        <?php
        $recipes = Recipe::getTrendingRecipes(5);

        foreach ($recipes as $recipe) {
        ?>

        <div class="col-xs-12">
            <article class="card">
                <img src="../Views/Images/spaghetti_test.png" alt="">
                <div class="card--content">
                    <h2 class="card--title">
                        <?php echo $recipe->getTitle(); ?>
                    </h2>
                    <div class="card--details">
                        <p>
                            <i class="fa-solid fa-user"></i>
                            <?php echo $recipe->getUsername(); ?>
                        </p>
                        <p>
                            <i class="fa-solid fa-clock"></i>
                            <?php echo $recipe->getTime(); ?> minutes
                        </p>
                        <p>
                            <i class="fa-solid fa-note-sticky"></i>
                            <?php echo $recipe->getCategoriesAsString(); ?>
                        </p>
                    </div>
                    <div class="card--vegan_spicy">
                        <div class="bg--gray <?php echo $recipe->getIsVegan() ? 'vegan--active' : ''; ?>">
                            <i class="fa-solid fa-seedling"></i>
                        </div>
                        <div class="bg--gray <?php echo $recipe->getIsSpicy() ? 'spicy--active' : ''; ?>">
                            <i class="fa-solid fa-pepper-hot"></i>
                        </div>
                    </div>
                    <div class="card--rating">
                        <div class="box">
                            <p class="card--score">
                                <?php echo $recipe->getRating(); ?>
                                <i class="fa-solid fa-star"></i>
                            </p>
                            <p class="card--number">
                                <?php echo $recipe->getRatingUsersCount(); ?>
                                <i class="fa-solid fa-user"></i>
                            </p>
                        </div>
                    </div>
                    <form method="post" action="recipe_details.php">
                        <input type="hidden" name="hidden_title" value="<?php echo $recipe->getTitle() ?>">
                        <input type="hidden" name="hidden_user_id" value="<?php echo $recipe->getUserId() ?>">
                        <button type="submit" name="recipe_details_submit" class="card--button">Details</button>
                    </form>
                </div>
            </article>
        </div>

        <?php
        }
        ?>

    </section>

</main>