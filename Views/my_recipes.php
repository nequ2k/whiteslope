<?php session_start();
if (!isset($_SESSION['userid'])) {
    header("location: ../Views/mainpage.php");
}
?>
<?php require "nav.php" ?>

<link rel="stylesheet" href="CSS/mainpage.css">
<link rel="stylesheet" href="CSS/body_grid.css">

<main class="loggedIn">

    <p>My <span class="chefs_p">recipes</span></p>

    <form class="search_form">
        <input type="search" placeholder="search">
        <button type="submit" class="search_button"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>

    <form action="add_recipe.php" method="post">
        <button type="submit" class="btn-primary">Add new recipe</button>
    </form>

    <div class="top_trending_recipes">
        <?php
        require_once '../Classes/user_recipe_classes.php';
        $userRecipes = new UserRecipe($_SESSION['userid']);
        $recipes = $userRecipes->getUserRecipes();

        if (empty($recipes)) {
            echo "You have not posted anything yet!";
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
</main>