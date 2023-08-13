<?php session_start(); ?>

<?php require "nav.php" ?>

<link rel="stylesheet" href="CSS/mainpage.css">

<main class="col-xs-12 col-sm-10 col-md-6 col-lg-11">

    <p>Popular <span class="chefs_p">chefs</span></p>

    <div class="popular_chefs">

        <a href="">
            <div class="popular_chef">
                <img src="../Views/Images/banner.jpg">
                User123#1
            </div>
        </a>
        <a href="">
            <div class="popular_chef">
                <img src="../Views/Images/banner.jpg">
                User123#1
            </div>
        </a>
        <a href="">
            <div class="popular_chef">
                <img src="../Views/Images/banner.jpg">
                User123#1
            </div>
        </a>
    </div>

    <form class="search_form" action="search_results.php" method="GET">
        <input type="search" placeholder="search" name="searchresults">
        <button type="submit" class="search_button"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>

    <p>Top trending receipes</p>
    <div class="top_trending_recipes col-xs-12 col-sm-8 col-md-6 col-lg-12">
        <?php
        require_once '../Classes/recipe_classes.php';
        $recipes = Recipe::getTrendingRecipes(10);

        foreach ($recipes as $recipe) {
        ?>

        <div class="top_trending_recipe">
            <img src="../Views/Images/spaghetti_test.png">
            <div class="mid">
                <p class="name"><?php echo $recipe->getTitle(); ?></p>
                <div class="inner_mid">
                    <p class="details">
                        <i class="fa-solid fa-user"></i>
                        <?php echo $recipe->getUsername(); ?>
                    </p>
                    <p class="details">
                        <i class="fa-solid fa-clock"></i>
                        <?php echo $recipe->getTime(); ?> minutes
                    </p>
                    <p class="details">
                        <i class="fa-solid fa-note-sticky"></i>
                        <?php echo $recipe->getCategory(); ?>
                    </p>
                </div>
            </div>
            <div class="right">
                <div class="vegan_spicy">
                    <div class="gray <?php echo $recipe->getIsVegan() ? 'green' : ''; ?>">
                        <i class="fa-solid fa-seedling"
                            style="color: <?php echo $recipe->getIsVegan() ? '#42f410' : ''; ?>;"></i>
                    </div>
                    <div class="gray">
                        <i class="fa-solid fa-pepper-hot"
                            style="color: <?php echo $recipe->getLikesHot() ? '#ff2600' : ''; ?>;"></i>
                    </div>
                </div>
                <div class="rating">
                    <div class="inner_rating">
                        <?php  echo $recipe->getRating();
                            ?>
                        <i class="fa-solid fa-star" style="color: #ffea00;"></i>
                    </div>
                    <div class="inner_rating">
                        <?php // echo $recipe->getLikes(); 
                            ?>
                        <i class="fa-solid fa-user"></i>
                    </div>
                </div>
                <form method="post" action="recipe_details.php">
                    <input type="hidden" name="hidden_title" value="<?php echo $recipe->getTitle()?>">
                    <input type="hidden" name="hidden_user_id" value="<?php echo $recipe->getUserId()?>">
                    <button type="submit" name="recipe_details_submit" class="details_button">Details</button>
                </form>
            </div>
        </div>

        <?php
        }
        ?>

    </div>






</main>