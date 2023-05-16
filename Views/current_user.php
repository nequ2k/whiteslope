<?php require "header.php" ?>
<?php require "nav.php" ?>

<link rel="stylesheet" href="CSS/current_user.css">
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
                <button class="preferences_change_button">Change preferences</button>
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
</main>