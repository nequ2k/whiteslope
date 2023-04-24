<?php require "header.php" ?>
<link rel="stylesheet" href="CSS/register.css">

<main>
    <section>

        <?php



        if(empty($selector)||empty($validator))
        {
            echo "We couldn't validate your request";
        }
        else
        {
            $selector = $_GET['selector'];
            $validator = $_GET['validator'];
            if(ctype_xdigit($selector)!==false && ctype_xdigit($validator)!==false)
            {
                ?>
        <h1>Reset your password</h1>
        <form action="../Includes/reset_password_includes.php" method="post">

            <input type="hidden" name="selector" value="<?php echo $selector ?>">
            <input type="hidden" name="validator" value="<?php echo $validator ?>">

            <label for="newPassword">New password</label>
            <input name="newPassword" id="newPassword" type="password" required="" placeholder="*************">
            <label for="newPasswordRepeat">Repeat new password</label>
            <input name="newPasswordRepeat" id="newPasswordRepeat" type="password" required="" placeholder="*************">


            <button type="submit" name="submit-new-password">Reset</button>
        </form>

        <?php
            }
        }


        ?>



    </section>
</main>


