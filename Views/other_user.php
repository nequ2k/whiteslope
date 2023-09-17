<?php session_start();
if (!isset($_SESSION['userid'])) {
    header("location: ../Views/mainpage.php");
}
?>
<?php require "nav.php" ?>

<main class="loggedIn other_user">
    <h1><?php echo $_GET["username"]; ?> recipes</h1>
    <div class="user_img">
        <?php
        require_once '../Classes/user_classes.php';
        require_once '../Classes/recipe_classes.php';

        $recipes = Recipe::getRecipesByUsername($_GET["username"]);
        $userId = User::getUserIdByUsername($_GET["username"]);
        $jpegFilePath = "../uploads/{$userId}.jpg";
        $pngFilePath = "../uploads/{$userId}.png";

        if (file_exists($jpegFilePath)) {
            echo "<img alt='' src='{$jpegFilePath}'>";
        } elseif (file_exists($pngFilePath)) {
            echo "<img alt='' src='{$pngFilePath}'>";
        } else {
            echo "<img alt='' src='../uploads/default_user.png'>";
        }
        ?>
    </div>
    <form style="text-align:center" method="" action="">
        <div class="user_data">
            <div class="row recipes_number">
                <label><?php echo count($recipes)?></label> <!-- number of user recipes -->
                <i class="fas fa-hamburger"></i>
            </div>
            <div class="row recipes_ratings">
                <label><?php echo User::avg($userId)?></label> <!-- average rating of all user recipes -->
                <i class="fas fa-star"></i>
            </div>
        </div>
    </form>

    <!-- add function to list here all user recipes of top 5 user recipes -->
    <h2>User recipes</h2>
    <section class="recipes_list">

        <?php
        $recipes = Recipe::getRecipesByUsername($_GET["username"]);

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