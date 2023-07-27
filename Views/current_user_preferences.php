<?php session_start();
if(!isset($_SESSION['userid']))
{
    header("location: ../Views/mainpage.php");
}
?>
<?php require "header.php" ?>
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
        $categories = $userPreferences->getUserPreferences();

        if (empty($categories)) {
            echo "No categories found!";
        } else {
            foreach ($categories as $category) {
                ?>
                <div class="preferences">
                    <input type="checkbox" checked name="categories[]" value="<?php echo $category['category_name']; ?>">
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

