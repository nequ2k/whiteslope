<?php session_start();
if (isset($_SESSION['userid'])) {
    header("location: ../Views/mainpage.php");
}
?>
<?php require "header.php" ?>

<main class="notLoggedIn">
    <section>
        <h1>Recipello</h1>
        <h2>Your app for cooking and saving money</h2>
    </section>
    <section>

        <?php if (isset($_GET['error'])) { ?>

        <div id="fail">
            <p>Invalid login or password</p>
        </div>

        <?php
        }
        ?>

        <h3>Sign in</h3>
        <form action="../Includes/login_includes.php" method="post">
            <label for="login">Login</label>
            <input name="login" id="login" type="text" required="" placeholder="User123#!">

            <label for="password">Password</label>
            <input name="password" id="password" type="password" required="" placeholder="password">


            <button type="submit" name="submit">Login</button>
        </form>
        <a href="register.php">
            Don`t have any account? Sign up!
            <i class="fa-solid fa-arrow-right"></i>
        </a>
        <a href="password_reset.php">
            Reset your password
            <i class="fa-solid fa-arrow-right"></i>
        </a>
    </section>
    <img src="Images/banner.jpg" alt="">
</main>