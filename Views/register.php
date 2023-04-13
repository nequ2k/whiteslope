<?php require "header.php" ?>
<link rel="stylesheet" href="CSS/register.css">

<main>
    <div id="left" class="col-xs-12 col-sm-8 col-md-6 col-lg-6"></div>
    <div id="right" class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
        <section class="col-xs-12 col-sm-8 col-md-6 col-lg-8">
            <h3>Sign up</h3>
            <form action="../includes/signup_includes.php" method="post">
                <label for="email">E-mail</label>
                <input name="email" id="email" type="email" required="" placeholder="email@example.com">
                <label class="red" for="email"><?php if(isset($_GET['emailTakenErr'])) echo "E-mail already taken"; ?></label>

                <label for="login">Login</label>
                <input name="login" id="login" type="text" required="" placeholder="User123#!">
                <label class="red" for="email"><?php if(isset($_GET['usernameTakenErr'])) echo "Login already taken"; ?></label>

                <label for="password">Password</label>
                <input name="password" id="password" type="password" required="">
                <label class="red" for="email"><?php if(isset($_GET['invalidpasswordErr'])) echo "Password must be minimum 8 characters long and have uppercase letters, lowercase letters, numbers and symbols"; ?></label>

                <label for="confirm_password">Confirm Password</label>
                <input name="confirm_password" id="confirm_password" type="password" required="">
                <label class="red" for="email"><?php if(isset($_GET['password!matchErr'])) echo "Passwords don`t match"; ?></label>

                <button type="submit" name="submit">Register</button>
            </form>
            <div>
                <a href="login.php">
                    Already have an account? Log in!
                    <i class="fa-solid fa-arrow-right" style="color: #ffffff;"></i>
                </a>
            </div>
        </section>
    </div>
</main>


