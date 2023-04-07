<?php require "header.php" ?>
<link rel="stylesheet" href="CSS/register.css">
<link rel="stylesheet" href="CSS/password_reset.css">

<main>
    <section>
        <h1>Reset your password</h1>
        <form>
            <label for="login">Login</label>
            <input name="login" id="login" type="text" required="" placeholder="User123#!">

            <label for="email">E-mail</label>
            <input name="email" id="email" type="email" required="" placeholder="email@example.com">

            <p class="red">The provided data is incorrect!</p>

            <button type="submit">Reset</button>
        </form>
    </section>
</main>


