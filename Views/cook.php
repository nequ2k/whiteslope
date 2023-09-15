<?php session_start(); ?>

<?php require "nav.php" ?>

<main class="loggedIn cook">
    <h1>Chose ingredients you want to use!</h1>
    <section class="ingredients">
        <form action="cook_results.php" method="post">
            <?php
            require_once '../Classes/Ingredient_classes.php';
            require_once '../Classes/Ingredient_category_classes.php';
            $ingredients_categories = Ingredient::getAllCategories();
            foreach ($ingredients_categories as $category) {
                echo
                "<ul class='ingredients_category col-xs-12'>
            <h3>" . $category->getCategoryName() . "</h3>";
                $ingredients = Ingredient::getIngredients($category->getCategoryId());
                foreach ($ingredients as $ingredient) {
                    echo "<li class='ingredients_category_item'>";
                    echo "<input type='checkbox' name='ingredient[]' value='" . $ingredient->getName() . "'>";
                    echo "<label>" . $ingredient->getName() . "</label>";
                    echo "</li>";
                }
                echo "</ul>";
            }
            ?>
            <button type="submit" class="btn-primary">Search</button>
        </form>
    </section>

    <h2>You might like</h2>
    <section class="recipes_list">

        <?php
        require_once '../Classes/recipe_classes.php';
        $recipes = Recipe::getRecipesByPreferences($_SESSION['userid']);
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