<?php session_start(); ?>

<?php require "nav.php" ?>

<link rel="stylesheet" href="CSS/mainpage.css">

<main class="col-xs-12 col-sm-10 col-md-6 col-lg-11">
    <section>
        <h1>Results for: <?php if(isset($_GET['searchresults'])&&($_GET['searchresults']!==""))
        {
            echo $_GET['searchresults'];
        }
        else echo "no query given!"; ?></h1>
    </section>

    <section class="results">

        <div class="top_trending_recipes col-xs-12 col-sm-8 col-md-6 col-lg-12">
            <?php
            require_once '../Classes/recipe_classes.php';


            $recipes = Recipe::getRecipes($_GET['searchresults']);
            if (empty($recipes) || $_GET['searchresults']==="")
            {
                echo "No records found!";
            }
            else
            {

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
                            <?php // echo $recipe->getRating(); 
                                ?>
                            <i class="fa-solid fa-star" style="color: #ffea00;"></i>
                        </div>
                        <div class="inner_rating">
                            <?php // echo $recipe->getLikes(); 
                                ?>
                            <i class="fa-solid fa-user"></i>
                        </div>
                    </div>
                    <form>
                        <button type="submit" class="details_button">Details</button>
                    </form>
                </div>
            </div>

            <?php
            }
            }
            ?>

        </div>

    </section>
</main>