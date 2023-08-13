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

<link rel="stylesheet" href="CSS/current_user.css">
<link rel="stylesheet" href="CSS/current_user_preferences.css">

<main class="col-xs-12 col-sm-10 col-md-6 col-lg-11">
    <form>
        <div class="top_div">
            <div class="left">
                <h1>Hello, <span class="current_user_name_h1">User123#1</span></h1>
                <div class="current_user_data">
                    <label>Username:</label>
                    <input type="text" value="User123#1">
                </div>
                <div class="current_user_data">
                    <label>Email:</label>
                    <input type="email" value="user@example.com">
                </div>
            </div>
            <div class="current_user_img">
                <img src="Images/banner.jpg">
                <div>
                    <button class="img_change_button">
                        <i class="fa-solid fa-pen" style="color: #ffffff;"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="bottom_div">
            <div class="current_user_data">
                <label>Preferences:</label>
                <p>mexican, polish, burgers, italian, pizza, soups</p>
            </div>
            <button class="preferences_change_button" id="change_preferences_button" type="button">Change
                preferences</button>
            <div class="vegan_spicy">
                <div>
                    <input type="checkbox" id="Vegan" name="Vegan" value="Vegan">
                    <span class="check"></span>
                    <label for="Vegan">Vegan</label>
                </div>
                <div>
                    <input type="checkbox" id="Spicy" name="Spicy" value="Spicy">
                    <span class="check"></span>
                    <label for="Spicy">Spicy</label>
                </div>
            </div>
            <button class="password_change_button">Change password</button>
        </div>
        <button class="save_changes_button" type="submit">Save changes</button>
    </form>

    <section class="preferences_checklist" id="preferences_checklist">
        <form method="POST" action="process_form.php">

            <?php
            require_once '../Classes/user_recipe_preferences_classes.php';

            $userPreferences = new UserPreference($_SESSION['userid']);
            $categories = $userPreferences->getPreferences();
            $user_prefs = $userPreferences->getUserPreferences();

            if (!empty($user_prefs)) {
                $preferences_array = explode(', ', $user_prefs[0]['preference']);
            } else {
                $preferences_array = [];
            }

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


            <button class="save_changes_button" id="preferences_save_button" type="submit">Save changes</button>
        </form>
    </section>
</main>

<script>
var change_preferences_button = document.getElementById("change_preferences_button");
var preferences_checklist = document.getElementById("preferences_checklist");

change_preferences_button.addEventListener("click", () => {
    preferences_checklist.style.display = (preferences_checklist.style.display === "none" ?
        "block" : "none");
});
</script>