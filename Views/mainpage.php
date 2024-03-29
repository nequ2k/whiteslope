<?php session_start(); ?>

<?php require "nav.php" ?>

<main class="loggedIn mainpage">
    <h2>Popular <span class="text-green">chefs</span></h2>

    <section class="popular_chefs">
    <?php require_once '../Classes/user_classes.php';
    $chefs = User::getTopChef(3);
    foreach ($chefs as $chef){
        $jpegFilePath = "../uploads/{$chef->getId()}.jpg";
        $pngFilePath = "../uploads/{$chef->getId()}.png";
        ?>
        <a href="other_user.php?username=<?php echo $chef->getUsername(); ?>">
            <div class="popular_chefs--item">
                <?php
                if (file_exists($jpegFilePath)) {
                echo "<img alt='' src='{$jpegFilePath}'>";
                } elseif (file_exists($pngFilePath)) {
                echo "<img alt='' src='{$pngFilePath}'>";
                } else {
                echo "<img alt='' src='../uploads/default_user.png'>";
                }?>
                <?php echo $chef->getUsername();?>
            </div>
        </a>
        <?php }?>
    </section>

    <form class="search_form" action="search_results.php" method="GET">
        <input type="search" placeholder="search for recipes..." name="searchresults">
        <button type="submit" class="search_button"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>

    <form class="search_form" action="users_search_results.php" method="GET">
        <input type="search" placeholder="search for users..." name="userssearchresults">
        <button type="submit" class="users_search_button"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>

    <h2>Top trending recipes</h2>
    <section class="recipes_list">

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
                            <a href="other_user.php?username=<?php echo $recipe->getUsername(); ?>"><?php echo $recipe->getUsername(); ?></a>
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



    <?php
        require_once '../Classes/recipe_classes.php';
        $recipes = Recipe::getRecipesByPreferences($_SESSION['userid']);
        if($recipes != array("nullPreferences")){
            ?>
    <h2>Recipes for you</h2>
    <section class="recipes_list">
        <?php
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
                            <a href="other_user.php?username=<?php echo $recipe->getUsername(); ?>"><?php echo $recipe->getUsername(); ?></a>
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

    </section>


</main>