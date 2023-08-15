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
<link rel="stylesheet" href="CSS/body_grid.css">

<main>
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

    <!-- <section class="change_password_block" id="change_password_block">
        <form method="POST" action="#">
            <h2>Change password</h2>
            <div class="change_password_block--checks">
                <h3>Password must contain: </h3>
                <ul>
                    <li class="denied">
                        <i class="fas fa-times"></i>
                        <span>At least 8 characters</span>
                    </li>
                    <li class="denied">
                        <i class="fas fa-times"></i>
                        <span>At least 1 uppercase characters</span>
                    </li>
                    <li class="denied">
                        <i class="fas fa-times"></i>
                        <span>At least 1 lowercase characters</span>
                    </li>
                    <li class="denied">
                        <i class="fas fa-times"></i>
                        <span>At least 1 number</span>
                    </li>
                    <li class="denied">
                        <i class="fas fa-times"></i>
                        <span>At least 1 symbol</span>
                    </li>
                </ul>
            </div>
            <section class="inputs">
                <input type="password" placeholder="Old password">
                <input type="password" placeholder="New password" id="new">
                <input type="password" placeholder="Repeat new password" id="secondNew">
            </section>
            <section class="buttons">
                <button type="submit" class="save">Save</button>
                <button type="button" class="cancel">Cancel</button>
            </section>
        </form>
    </section> -->
</main>

<script>
var change_preferences_button = document.getElementById("change_preferences_button");
var preferences_checklist = document.getElementById("preferences_checklist");
preferences_checklist.style.display = "none";

change_preferences_button.addEventListener("click", () => {
    preferences_checklist.style.display = (preferences_checklist.style.display === "none" ?
        "block" : "none");
});

// var checks_password = document.querySelectorAll(".change_password_block--checks li");
// var new_password = document.getElementById("new");
// var second_new_password = document.getElementById("secondNew");
// let pswd = "";

// new_password.addEventListener("keyup", () => {
//     pswd = new_password.value;
//     if (pswd.length >= 8) {
//         checks_password[0].className = "correct";
//     } else {
//         checks_password[0].className = "denied";
//     }

//     let flag = 0;

//     for (let i = 0; i < pswd.length; i++) {
//         if (/[A-Z]/.test(pswd[i])) {
//             flag = 1;
//             break;
//         }
//     }

//     if (flag) checks_password[1].className = "correct";
//     else checks_password[1].className = "denied";

//     flag = 0;

//     for (let i = 0; i < pswd.length; i++) {
//         if (/[a-z]/.test(pswd[i])) {
//             flag = 1;
//             break;
//         }
//     }

//     if (flag) checks_password[2].className = "correct";
//     else checks_password[2].className = "denied";

//     flag = 0;

//     for (let i = 0; i < pswd.length; i++) {
//         if (parseInt(pswd[i])) {
//             flag = 1;
//             break;
//         }
//     }

//     if (flag) checks_password[3].className = "correct";
//     else checks_password[3].className = "denied";

//     flag = 0;

//     for (let i = 0; i < pswd.length; i++) {
//         if (/[`!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/.test(pswd[i])) {
//             flag = 1;
//             break;
//         }
//     }

//     if (flag) checks_password[4].className = "correct";
//     else checks_password[4].className = "denied";


//     checks_password.forEach(element => {
//         let temp = element.lastElementChild.innerHTML;
//         if (element.className === "denied") {
//             element.innerHTML = '<i class="fas fa-times"></i><span>' + temp + '</span>';
//         }
//         if (element.className === "correct") {
//             element.innerHTML = '<i class="fas fa-check"></i><span>' + temp + '</span>';
//         }
//     });
// });
</script>