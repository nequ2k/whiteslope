<?php session_start();
if (isset($_SESSION['userid'])) {
    header("location: ../Views/mainpage.php");
}
?>
<?php require "header.php" ?>

<main class="notLoggedIn" style="grid-template-areas: 'form form'">
    <section></section>
    <section>
        <form action="">
            <h1>Registration was successful</h1>
            <div style="font-size: 24px; text-align: center">
                We sent an email with confirmation and account details. You can now log in to this account.
            </div>
            <a href="login.php">
                Return to login page
                <i class="fa-solid fa-arrow-right"></i>
            </a>
        </form>
    </section>
    <img src="Images/banner.jpg" alt="">
</main>