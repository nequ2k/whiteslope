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

        <h3>Reset your password</h3>
        <form action="../Includes/reset_request_includes.php" method="post">


            <label for="email">E-mail</label>
            <input name="email" id="email" type="email" required="" placeholder="email@example.com">

            <label class="green"
                for="email"><?php if (isset($_GET['message']) && ($_GET['message'] === 'checkEmail')) echo "Check your email!"; ?></label>

            <button type="submit" name="reset-submit">Reset</button>

        </form>
    </section>
    <img src="Images/banner.jpg" alt="">

</main>