<?php session_start();
if(isset($_SESSION['userid']))
{
    header("location: ../Views/mainpage.php");
}
?>
<?php require "header.php" ?>
<link rel="stylesheet" href="CSS/register.css">
<link rel="stylesheet" href="CSS/login.css">

<main>
    <div id="left" class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
        <h1>Recipello</h1>
        <h2>Your app for cooking and saving money</h2>
    </div>
    <div id="right" class="col-xs-12 col-sm-8 col-md-6 col-lg-6">

    <section class="col-xs-12 col-sm-8 col-md-6 col-lg-8">
        <?php if(isset($_GET['error'])){ ?>


        <div id="fail" class="col-xs-12 col-sm-8 col-md-6 col-lg-8">
            <p>Invalid login or password</p>
        </div>

        <?php
        }
        ?>

        <h3>Sign in </h3>
        <form action="../Includes/login_includes.php" method="post">
            <label for="login">Login</label>
            <input name="login" id="login" type="text" required="" placeholder="User123#!">

            <label for="password">Password</label>
            <input name="password" id="password" type="password" required="" placeholder="password">


            <button type="submit" name="submit">Login</button>
        </form>
        <div class="a">
            <a href="register.php">
                Don`t have any account? Sign up!
                <i class="fa-solid fa-arrow-right" style="color: #000000;"></i>
            </a>
            <a href="password_reset.php">
                Reset your password
                <i class="fa-solid fa-arrow-right" style="color: #000000;"></i>
            </a>
        </div>
    </section>
    </div>
</main>


