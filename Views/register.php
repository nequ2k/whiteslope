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
        <h3>Sign up</h3>
        <form action="../Includes/signup_includes.php" method="post">
            <label for="email">E-mail</label>
            <input name="email" id="email" type="email" required="" placeholder="email@example.com">
            <label class="red"
                for="email"><?php if (isset($_GET['emailTakenErr'])) echo "E-mail already taken"; ?></label>

            <label for="login">Login</label>
            <input name="login" id="login" type="text" required="" placeholder="User123#!">
            <label class="red"
                for="login"><?php if (isset($_GET['usernameTakenErr'])) echo "Login already taken"; ?></label>


            <label for="password">Password</label>
            <input name="password" id="password" type="password" required="">
            <label class="red"
                for="password"><?php if (isset($_GET['invalidpasswordErr'])) echo "Password must be minimum 8 characters long and have uppercase letters, lowercase letters, numbers and symbols"; ?></label>

            <label for="confirm_password">Confirm Password</label>
            <input name="confirm_password" id="confirm_password" type="password" required="">
            <label class="red"
                for="confirm_password"><?php if (isset($_GET['password!matchErr'])) echo "Passwords don`t match"; ?></label>

            <button type="submit" name="submit">Register</button>
        </form>
        <a href="login.php">
            Already have an account? Log in!
            <i class="fa-solid fa-arrow-right" style="color: #ffffff;"></i>
        </a>
    </section>
    <img src="Images/banner.jpg" alt="">
</main>