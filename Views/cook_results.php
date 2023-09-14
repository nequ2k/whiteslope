<?php session_start(); ?>

<?php require "nav.php" ?>

<link rel="stylesheet" href="CSS/cook.css">
<link rel="stylesheet" href="CSS/body_grid.css">

<main class="loggedIn">
    <h1>Results</h1>
    <section class="ingredients">
        <?php
            require_once "../Classes/recipe_classes.php";
//            $ingredients = $_POST['ingredient'];
//            $recipes = Recipe::getRecipesByIngredients($ingredients);
            $recipes = Recipe::getRecipesByIngredients(array("onions","tomatoes","rice"));

        foreach ($recipes as $recipe) {
            if($recipe[1] != 0){
            ?>

            <div class="col-xs-12">
                <article class="card">
                    <img src="../Views/Images/spaghetti_test.png" alt="">
                    <div class="card--content">
                        <h2 class="card--title">
                            <?php echo $recipe[0]->getTitle(); ?>
                        </h2>
                        <div class="card--details">
                            <p>
                                <i class="fa-solid fa-user"></i>
                                <?php echo $recipe[0]->getUsername(); ?>
                            </p>
                            <p>
                                <i class="fa-solid fa-clock"></i>
                                <?php echo $recipe[0]->getTime(); ?> minutes
                            </p>
                            <p>
                                <i class="fa-solid fa-note-sticky"></i>
                                <?php echo $recipe[0]->getCategoriesAsString(); ?>
                            </p>
                        </div>
                        <div class="card--vegan_spicy">
                            <div class="bg--gray <?php echo $recipe[0]->getIsVegan() ? 'vegan--active' : ''; ?>">
                                <i class="fa-solid fa-seedling"></i>
                            </div>
                            <div class="bg--gray <?php echo $recipe[0]->getIsSpicy() ? 'spicy--active' : ''; ?>">
                                <i class="fa-solid fa-pepper-hot"></i>
                            </div>
                        </div>
                        <div class="card--rating">
                            <div class="box">
                                <p class="card--score">
                                    <?php echo $recipe[0]->getRating(); ?>
                                    <i class="fa-solid fa-star"></i>
                                </p>
                                <p class="card--number">
                                    <?php echo $recipe[0]->getRatingUsersCount(); ?>
                                    <i class="fa-solid fa-user"></i>
                                </p>
                            </div>
                        </div>
                        <form method="post" action="recipe_details.php">
                            <input type="hidden" name="hidden_title" value="<?php echo $recipe[0]->getTitle() ?>">
                            <input type="hidden" name="hidden_user_id" value="<?php echo $recipe[0]->getUserId() ?>">
                            <button type="submit" name="recipe_details_submit" class="card--button">Details</button>
                        </form>
                    </div>
                </article>
            </div>

            <?php
            }
        }
        ?>
    </section>

    <h2>You might like</h2>
    <section class="top_trending_recipes">

        <?php
        require_once '../Classes/recipe_classes.php';
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