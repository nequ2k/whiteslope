<?php require "header.php" ?>
<?php require "nav.php" ?>

<link rel="stylesheet" href="CSS/mainpage.css">
<link rel="stylesheet" href="CSS/body_grid.css">

<main>

    <h2>My favourite <span class="chefs_p">recipes</span></h2>

    <form class="search_form">
        <input type="search" placeholder="search">
        <button type="submit" class="search_button"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>


    <section class="top_trending_recipes">

        <?php
        require_once '../Classes/recipe_classes.php';
        $recipes = Recipe::getTrendingRecipes(10);

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
                            <?php echo $recipe->getCategory(); ?>
                        </p>
                    </div>
                    <div class="card--vegan_spicy">
                        <div class="bg--gray <?php echo $recipe->getIsVegan() ? 'vegan--active' : ''; ?>">
                            <i class="fa-solid fa-seedling"></i>
                        </div>
                        <div class="bg--gray <?php echo $recipe->getLikesHot() ? 'spicy--active' : ''; ?>">
                            <i class="fa-solid fa-pepper-hot"></i>
                        </div>
                    </div>
                    <div class="card--rating">
                        <div class="box">
                            <p class="card--score">
                                <?php echo $recipe->getRating(); ?>
                                <i class="fa-solid fa-star"></i>
                            </p>
                            <p class="card--number">47
                                <?php // echo $recipe->getLikes(); 
                                    ?>
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