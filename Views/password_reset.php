<?php require "header.php" ?>
<link rel="stylesheet" href="CSS/register.css">
<link rel="stylesheet" href="CSS/password_reset.css">

<main>
    <div id="left" class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
        <h1>Recipello</h1>
        <h2>Your app for cooking and saving money</h2>
    </div>
    <div id="right" class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
    <section>
        <div id="fail" class="col-xs-12 col-sm-8 col-md-6 col-lg-8">
            <p>The provided data is incorrect!</p>
        </div>
        <h3>Reset your password</h3>
        <form action="../Includes/reset_request_includes.php" method="post">

            <label for="login">Login</label>
            <input name="login" id="login" type="text" required="" placeholder="User123#!">

            <label for="email">E-mail</label>
            <input name="email" id="email" type="email" required="" placeholder="email@example.com">

            <button type="submit" name="reset-submit">Reset</button>
        </form>
    </section>
    </div>
</main>


