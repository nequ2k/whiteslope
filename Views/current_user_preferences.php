<?php session_start();
if (!isset($_SESSION['userid'])) {
    header("location: ../Views/mainpage.php");
}
?>
<?php require "nav.php" ?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<link rel="stylesheet" href="CSS/current_user_preferences.css">
<main class="col-xs-12 col-sm-10 col-md-6 col-lg-11">
    <form method="POST" action="process_form.php">
        <section>

            <?php
            require_once '../Classes/user_recipe_preferences_classes.php';
            $userPreferences = new UserPreference($_SESSION['userid']);
            $categories = $userPreferences->getPreferences();
            $user_prefs = $userPreferences->getUserPreferences();
            $preferences_array = explode(', ', $user_prefs[0]['preference']);

            if (empty($categories)) {
                echo "No categories found!";
            } else {
                foreach ($categories as $category) {
                    $category_name = $category['category_name'];
                    $is_checked = in_array($category_name, $preferences_array);
            ?>

            <div class="preferences">
                <input type="checkbox" <?php if ($is_checked) echo 'checked="checked"'; ?> name="categories[]"
                    value="<?php echo $category['category_name']; ?>">
                <label><?php echo $category['category_name']; ?></label>
            </div>


            <?php
                }
            }
            ?>
        </section>

        <button class="save_changes_button" type="submit">Save changes</button>
    </form>
</main>