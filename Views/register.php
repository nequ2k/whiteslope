<?php require "header.php" ?>
<link rel="stylesheet" href="CSS/register.css">
<main>
    <section>
        <h1>Sign up</h1>
        <form>
            <label for="email">E-mail</label>
            <input name="email" id="email" type="email" required="" placeholder="email@example.com">

            <label for="login">Login</label>
            <input name="login" id="login" type="text" required="" placeholder="User123#!">

            <label for="password">Password</label>
            <input name="password" id="password" type="password" required="" placeholder="password">

            <label for="confirm_password">Confirm Password</label>
            <input name="confirm_password" id="confirm_password" type="password" required="" placeholder="password">

            <button type="submit">Register</button>
        </form>
        <div>
            <a>
                Already have an account? Log In!
                <i class="fa-solid fa-arrow-right" style="color: #000000;"></i>
            </a>
        </div>
    </section>
</main>


