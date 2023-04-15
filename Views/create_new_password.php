<?php require "header.php" ?>
<link rel="stylesheet" href="CSS/register.css">

<main>
    <section>

        <?php

        $selector = $_GET['selector'];
        $validator = $_GET['validator'];

        if(empty($selector)||empty($validator))
        {
            echo "We couldnt validate your request";
        }
        else
        {
            if(ctype_xdigit($selector)!==false && ctype_xdigit($validator)!==false)
            {
                ?>
        <h1>Reset your password</h1>
        <form action="../Includes/reset_request_includes.php">

            <label for="newPassword">New password</label>
            <input name="newPassword" id="email" type="email" required="" placeholder="email@example.com">
            <label for="newPasswordRepeat">Repeat new password</label>
            <input name="newPasswordRepeat" id="email" type="email" required="" placeholder="email@example.com">

            <button type="submit" name="submit-new-password">Reset</button>
        </form>

        <?php
            }
        }


        ?>


        <h1>Reset your password</h1>
        <form action="../Includes/reset_request_includes.php">

            <label for="newPassword">New password</label>
            <input name="newPassword" id="email" type="email" required="" placeholder="email@example.com">
            <label for="newPasswordRepeat">Repeat new password</label>
            <input name="newPasswordRepeat" id="email" type="email" required="" placeholder="email@example.com">

            <button type="submit" name="submit-new-password">Reset</button>
        </form>
    </section>
</main>


