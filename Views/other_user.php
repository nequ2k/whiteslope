<?php session_start();
if (!isset($_SESSION['userid'])) {
    header("location: ../Views/mainpage.php");
}
?>
<?php require "nav.php" ?>

<main class="loggedIn other_user">
    <h1>Other_user_123
        <!-- add here real username --> <?php // echo $_SESSION["user_name"]; ?>
    </h1>
    <div class="user_img">
        <!-- add here user photo -->
        <?php
        // $userId = $_SESSION['userid'];
        // $jpegFilePath = "../uploads/{$userId}.jpg";
        // $pngFilePath = "../uploads/{$userId}.png";

        // if (file_exists($jpegFilePath)) {
        //     echo "<img src='{$jpegFilePath}'>";
        // } elseif (file_exists($pngFilePath)) {
        //     echo "<img src='{$pngFilePath}'>";
        // } else {
            echo "<img src='../uploads/default_user.png'>";
        // }
        ?>
    </div>
    <form style="text-align:center" method="" action="">
        <div class="user_data">
            <div class="row recipes_number">
                <label>45</label> <!-- number of user recipes -->
                <i class="fas fa-hamburger"></i>
            </div>
            <div class="row recipes_ratings">
                <label>4.0</label> <!-- average rating of all user recipes -->
                <i class="fas fa-star"></i>
            </div>
            <div class="row" id="user_preferences">
                <label>Preferences</label> <!-- user preferences -->
                <p id="preferences_input"> Polish, Polish, Polish, Polish, Polish, Polish, Polish, Polish, Polish,
                    Polish
                    <?php //$prefs = $userPreferences->getUserPreferences();
                                            //if (!empty($prefs)) echo $prefs[0]["preference"];
                                            ?>
                </p>
            </div>
            <div class="vegan_spicy">
                <!-- user vegan and spicy, add good if statements for classess vegan--active and spicy--active -->
                <div class="bg--gray vegan--active <?php //echo $recipe->getIsVegan() ? 'vegan--active' : ''; ?>">
                    <i class="fa-solid fa-seedling"></i>
                </div>
                <!-- <div>
                    <input type="checkbox" <?php // if ($userPreferences->getVegan()) echo 'checked="checked"';
                                            ?> id="Vegan" name="Vegan" value="Vegan">
                    <label for="Vegan">Vegan</label>
                </div> -->
                <div class="bg--gray spicy--active <?php //echo $recipe->getIsSpicy() ? 'spicy--active' : ''; ?>">
                    <i class="fa-solid fa-pepper-hot"></i>
                </div>
                <!-- <div>
                    <input type="checkbox" <?php // if ($userPreferences->getSpicy()) echo 'checked="checked"';
                                            ?> id="Spicy" name="Spicy" value="Spicy">
                    <label for="Spicy">Spicy</label>
                </div> -->
            </div>
        </div>
    </form>

    <!-- add function to list here all user recipes of top 5 user recipes -->
    <h2>User recipes</h2>
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