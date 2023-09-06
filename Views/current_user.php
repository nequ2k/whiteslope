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
require_once '../Classes/user_recipe_preferences_classes.php';
$userPreferences = new UserPreference($_SESSION['userid']);
?>

<link rel="stylesheet" href="CSS/current_user.css">
<!-- <link rel="stylesheet" href="CSS/current_user_preferences.css"> -->
<link rel="stylesheet" href="CSS/body_grid.css">

<main class="loggedIn">
    <h1>Hello, <?php echo $_SESSION["user_name"]; ?></h1>
    <div class="current_user_img">
    <?php
    $userId = $_SESSION['userid'];
    $jpegFilePath = "../uploads/{$userId}.jpg";
    $pngFilePath = "../uploads/{$userId}.png";

    if (file_exists($jpegFilePath)) {
        echo "<img src='{$jpegFilePath}'>";
    } elseif (file_exists($pngFilePath)) {
        echo "<img src='{$pngFilePath}'>";
    } else {
        echo "<img src='../Views/Images/banner.jpg'>"; 
    }
    ?>

    <button class="img_change_button" type="button">
        <i class="fa-solid fa-pen" style="color: #ffffff;"></i>
    </button>
</div>
    <form style="text-align:center" method="post" action="../Views/process_form.php">
        <div class="current_user_data">
            <div class="row">
                <label>Username</label>
                <input type="text" value="<?php echo $_SESSION["user_name"]; ?>" name="usernamechange">
                <label class="red"
                    for="usernamechange"><?php if (isset($_GET['usernameTakenErr'])) echo "Username already taken"; ?></label>
            </div>
            <div class="row">
                <label>Email</label>
                <input type="email" value="<?php echo $_SESSION["user_email"];  ?>" name="emailchange">
                <label class="red"
                    for="emailchange"><?php if (isset($_GET['emailTakenErr'])) echo "E-mail already taken"; ?></label>
            </div>
            <div class="row" id="user_preferences">
                <label>Preferences</label>
                <p id="preferences_input"> <?php $prefs = $userPreferences->getUserPreferences();
                                            if (!empty($prefs)) echo $prefs[0]["preference"];
                                            ?>
                </p>
                <input type="hidden" id="preferences_input_hidden" value="" name="hidden">
            </div>
            <button class="preferences_change_button btn-primary" id="change_preferences_button" type="button">Change
                preferences</button>
            <div class="vegan_spicy">
                <div>
                    <input type="checkbox" <?php if ($userPreferences->getVegan()) echo 'checked="checked"';
                                            ?> id="Vegan" name="Vegan" value="Vegan">
                    <label for="Vegan">Vegan</label>
                </div>
                <div>
                    <input type="checkbox" <?php if ($userPreferences->getSpicy()) echo 'checked="checked"';
                                            ?> id="Spicy" name="Spicy" value="Spicy">
                    <label for="Spicy">Spicy</label>
                </div>
            </div>
            <button type="button" class="password_change_button btn-primary">Change password</button>
        </div>
        <button class="save_changes_button btn-primary right-0" type="submit" name="submitall">Save changes</button>
    </form>

    <section class="preferences_checklist_block" id="preferences_checklist">
        <form>
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
                <input type="checkbox" <?php if ($is_checked) echo 'checked="checked"';

                                                ?> name="categories[]" value="<?php echo $category['category_name'];

                                                                                ?>">
                <label><?php echo $category['category_name'];

                                ?></label>
            </div>

            <?php
                }
            }

            ?>

            <button class="save_changes_button" id="preferences_save_button" type="button">Save changes</button>
        </form>
    </section>

    <section class="change_password_block" id="change_password_block">
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
                <input type="password" placeholder="Repeat new password" id="repeat">
            </section>
            <section class="buttons">
                <button type="submit" class="save">Save</button>
                <button type="button" class="cancel">Cancel</button>
            </section>
        </form>
    </section>

    <section class="change_photo_block">
        <form action="../Includes/upload_photo_includes.php" method="POST" enctype="multipart/form-data">
            <label for="photo">Choose a photo (JPEG or PNG only):</label>
            <input type="file" name="photo" id="photo" accept=".jpeg, .jpg, .png, image/jpeg, image/png">
            <button type="submit" class="btn-primary" name="upload">Upload photo</button>
        </form>
    </section>
</main>

<script>
var body = document.querySelector('body');

var change_preferences_button = document.getElementById("change_preferences_button");
var preferences_checklist = document.getElementById("preferences_checklist");
preferences_checklist.style.display = "none";
body.style.overflow = "visible";

change_preferences_button.addEventListener("click", () => {
    preferences_checklist.style.display = (preferences_checklist.style.display === "none" ?
        "block" : "none");
    body.style.overflow = (body.style.overflow === "visible" ?
        "hidden" : "visible");
    window.scrollTo(0, 0);
});

var checks_password = document.querySelectorAll(".change_password_block--checks li");
var new_password = document.getElementById("new");
var repeat_new_password = document.getElementById("repeat");
let pswd = "";
var cancel_button = document.querySelector(".cancel");
var show_password_change_button = document.querySelector(".password_change_button");
var change_password_block = document.querySelector(".change_password_block");
var save_pswd_button = document.querySelector(".save");
change_password_block.style.display = "none";
let accepted_conditions = 0;

show_password_change_button.addEventListener("click", () => {
    change_password_block.style.display = (change_password_block.style.display === "none" ?
        "block" : "none");
    body.style.overflow = (body.style.overflow === "visible" ?
        "hidden" : "visible");
    window.scrollTo(0, 0);
});

new_password.addEventListener("keyup", () => {
    pswd = new_password.value;
    if (pswd.length >= 8) {
        checks_password[0].className = "correct";
    } else {
        checks_password[0].className = "denied";
    }

    let flag = 0;

    for (let i = 0; i < pswd.length; i++) {
        if (/[A-Z]/.test(pswd[i])) {
            flag = 1;
            break;
        }
    }

    if (flag) checks_password[1].className = "correct";
    else checks_password[1].className = "denied";

    flag = 0;

    for (let i = 0; i < pswd.length; i++) {
        if (/[a-z]/.test(pswd[i])) {
            flag = 1;
            break;
        }
    }

    if (flag) checks_password[2].className = "correct";
    else checks_password[2].className = "denied";

    flag = 0;

    for (let i = 0; i < pswd.length; i++) {
        if (parseInt(pswd[i])) {
            flag = 1;
            break;
        }
    }

    if (flag) checks_password[3].className = "correct";
    else checks_password[3].className = "denied";

    flag = 0;

    for (let i = 0; i < pswd.length; i++) {
        if (/[`!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/.test(pswd[i])) {
            flag = 1;
            break;
        }
    }

    if (flag) checks_password[4].className = "correct";
    else checks_password[4].className = "denied";

    checks_password.forEach(element => {
        let temp = element.lastElementChild.innerHTML;
        if (element.className === "denied") {
            element.innerHTML = '<i class="fas fa-times"></i><span>' + temp + '</span>';
        }
        if (element.className === "correct") {
            element.innerHTML = '<i class="fas fa-check"></i><span>' + temp + '</span>';
        }
    });

    accepted_conditions = 0;
    checks_password.forEach(element => {
        if (element.className === "correct") accepted_conditions++;
    });

    if ((new_password.value === repeat_new_password.value) && (accepted_conditions == 5)) {
        save_pswd_button.style.pointerEvents = "all";
        save_pswd_button.style.backgroundColor = "#7cb518";
    } else {
        save_pswd_button.style.pointerEvents = "none";
        save_pswd_button.style.backgroundColor = "lightgray";
    }
});

repeat_new_password.addEventListener("keyup", () => {
    accepted_conditions = 0;
    checks_password.forEach(element => {
        if (element.className === "correct") accepted_conditions++;
    });

    if ((new_password.value === repeat_new_password.value) && (accepted_conditions == 5)) {
        save_pswd_button.style.pointerEvents = "all";
        save_pswd_button.style.backgroundColor = "#7cb518";
    } else {
        save_pswd_button.style.pointerEvents = "none";
        save_pswd_button.style.backgroundColor = "lightgray";
    }
});

cancel_button.addEventListener("click", () => {
    if (change_password_block.style.display === "block") {
        change_password_block.style.display = "none";
        body.style.overflow = "visible";
    }
});

show_password_change_button.addEventListener("click", () => {
    if (change_password_block.style.display === "none") {
        change_password_block.style.display = "block";
        body.style.overflow = "visible";
    }
});

var change_preferences_button = document.querySelector("#change_preferences_button");
var preferences_checklist = document.querySelector("#preferences_checklist");
preferences_checklist.style.display = "none";
body.style.overflow = "visible";
var preferences_list = document.querySelectorAll('#preferences_checklist .preferences');
var selected_preferences = [];
let preferences_input = document.querySelector('#user_preferences p');
let preferences_input_hidden = document.querySelector('#preferences_input_hidden');

var save_preferences_button = document.querySelector('#preferences_save_button');
// let preferences_input = document.querySelector('#preferences_input');

// preferences_input_hidden.value = "";
preferences_input_hidden.value = preferences_input.innerHTML.trim();

save_preferences_button.addEventListener("click", () => {
    preferences_input.innerHTML = "";
    preferences_input_hidden.value = "";
    selected_preferences = [];
    if (preferences_checklist.style.display === "block") {
        preferences_checklist.style.display = "none";
        body.style.overflow = "visible";
        preferences_list.forEach(element => {
            if (element.children[0].checked) {
                selected_preferences.push(element.children[1].innerHTML);
            }
        });
    }
    for (let i = 0; i < selected_preferences.length; i++) {
        if (i < selected_preferences.length - 1) {
            // preferences_input.innerHTML += selected_preferences[i] + ', ';
            preferences_input_hidden.value += selected_preferences[i] + ', ';
        } else {
            // preferences_input.innerHTML += selected_preferences[i];
            preferences_input_hidden.value += selected_preferences[i];
        }
    }
    // preferences_input_hidden.value = preferences_input.innerHTML;
    preferences_input.innerHTML = preferences_input_hidden.value.trim();
});

var change_photo_block = document.querySelector('.change_photo_block');
change_photo_block.style.display = 'none';
var change_photo_button = document.querySelector('.img_change_button');

change_photo_button.addEventListener("click", () => {
    change_photo_block.style.display = (change_photo_block.style.display === "none" ?
        "block" : "none");
    body.style.overflow = (body.style.overflow === "visible" ?
        "hidden" : "visible");
    window.scrollTo(0, 0);
});

var save_photo_button = document.querySelector('.change_photo_block form button');

save_photo_button.addEventListener("click", () => {
    if (change_photo_block.style.display === "block") {
        change_photo_block.style.display = "none";
        body.style.overflow = "visible";
    }
});
</script>