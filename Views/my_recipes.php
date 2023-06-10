<?php session_start();
if(!isset($_SESSION['userid']))
{
    header("location: ../Views/mainpage.php");
}
?>
<?php require "header.php" ?>
<?php require "nav.php" ?>

<link rel="stylesheet" href="CSS/mainpage.css">

<main class="col-xs-12 col-sm-10 col-md-6 col-lg-11">

    <p>My <span class="chefs_p">recipes</span></p>

    <form class="search_form">
        <input type="search" placeholder="search">
        <button type="submit" class="search_button"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>


    <div class="top_trending_recipes" class="col-xs-12 col-sm-8 col-md-6 col-lg-12">
        <?php
        require_once '../Classes/user_recipe_classes.php';
        $userRecipes = new UserRecipe($_SESSION['userid']);
        $recipes = $userRecipes->getUserRecipes();

        if (empty($recipes)) {
            echo "You have not posted anything yet!";
        } else {
            foreach ($recipes as $recipe) {
                ?>
                <div class="top_trending_recipe">
                    <img src="../Views/Images/spaghetti_test.png">
                    <div class="mid">
                        <p class="name"><?php echo $recipe->getTitle(); ?></p>
                        <div class="inner_mid">
                            <p class="details">
                                <i class="fa-solid fa-user"></i>
                                User123#1
                            </p>
                            <p class="details">
                                <i class="fa-solid fa-clock"></i>
                                <?php echo $recipe->getTime(); ?> minutes
                            </p>
                            <p class="details">
                                <i class="fa-solid fa-note-sticky"></i>
                                Italian food
                            </p>
                        </div>
                    </div>
                    <div class="right">
                        <div class="vegan_spicy">
                            <div class="gray">
                                <?php if ($recipe->getIsVegan() === 1) { ?>
                                    <i class="fa-solid fa-seedling" style="color: #42f410;"></i>
                                <?php } ?>
                            </div>
                            <div class="gray">
                                <?php if ($recipe->getLikesHot() === 1) { ?>
                                    <i class="fa-solid fa-pepper-hot" style="color: #ff2600;"></i>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="rating">
                            <div class="inner_rating">
                                <?php echo $recipe->getRating(); ?>
                                <i class="fa-solid fa-star" style="color: #ffea00;"></i>
                            </div>
                            <div class="inner_rating">
                                <?php echo $recipe->getLikesHot(); ?>
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
</main>