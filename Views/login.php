<?php require "header.php" ?>
<link rel="stylesheet" href="CSS/register.css">
<link rel="stylesheet" href="CSS/login.css">

<main>
    <section>
        <h1>Sign in</h1>
        <form>
            <label for="login">Login</label>
            <input name="login" id="login" type="text" required="" placeholder="User123#!">

            <label for="password">Password</label>
            <input name="password" id="password" type="password" required="" placeholder="password">

            <p class="red">The provided data is incorrect!</p>

            <button type="submit">Login</button>
        </form>
        <div class="a">
            <a>
                Don`t have any account? Sign up!
                <i class="fa-solid fa-arrow-right" style="color: #000000;"></i>
            </a>
            <a>
                Reset your password
                <i class="fa-solid fa-arrow-right" style="color: #000000;"></i>
            </a>
        </div>
    </section>
</main>


