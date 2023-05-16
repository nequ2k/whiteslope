<?php session_start();
if(isset($_SESSION['userid']))
{
    header("location: ../Views/mainpage.php");
}
?>
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

        <h3>Reset your password</h3>
        <form action="../Includes/reset_request_includes.php" method="post">


            <label for="email">E-mail</label>
            <input name="email" id="email" type="email" required="" placeholder="email@example.com">

            <label class="green" for="email"><?php if(isset($_GET['message'])&&($_GET['message']==='checkEmail')) echo "Check your email!"; ?></label>

            <button type="submit" name="reset-submit">Reset</button>

        </form>
    </section>
    </div>
</main>


