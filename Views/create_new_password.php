<?php require "header.php" ?>
<link rel="stylesheet" href="CSS/register.css">

<main class="notLoggedIn single-form" style="grid-template-areas: 'form form'">
    <section style="display: none;"></section>
    <section>
        <?php
        //if(empty($_GET['token']))
        //{
        //    echo "We couldn't validate your request";
        //}
        //else {
        //    $token = $_GET['token'];

        ?>
        <h3>Reset your password</h3>
        <form action="../Includes/reset_password_confirmed_includes.php" method="post">
            <input type="hidden" name="token" value="<?php echo $token; ?>">
            <label for="newPassword">New password</label>
            <input name="newPassword" id="newPassword" type="password" required="" placeholder="*************">
            <label for="newPasswordRepeat">Repeat new password</label>
            <input name="newPasswordRepeat" id="newPasswordRepeat" type="password" required=""
                placeholder="*************">


            <button type="submit" name="submit-new-password">Reset</button>
        </form>

        <?php
        //}
        ?>

    </section>
    <img src="Images/banner.jpg" alt="">
</main>