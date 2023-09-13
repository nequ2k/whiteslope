<?php session_start(); ?>

<?php require "nav.php" ?>

<main class="loggedIn">
    <section>
        <h1>Results for: <?php if (isset($_GET['searchresults']) && ($_GET['searchresults'] !== "")) {
                                require_once '../Classes/recipe_classes.php';
                                echo $_GET['searchresults'];
                                $recipes = Recipe::getRecipes($_GET['searchresults']);
                            } else echo "no query given!"; ?></h1>
    </section>

    <section class="results">

        <div class="recipes_list">
            <?php

            if (empty($recipes) || $_GET['searchresults'] === "") {
                echo "No records found!";
            } else {

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
            }
            ?>

        </div>

    </section>
</main>