<?php require "header.php" ?>

<link rel="stylesheet" href="CSS/hamburgers.min.css">
<link rel="stylesheet" href="CSS/nav.css">

<form class="shopping_list" action="shopping_list.php" method="post">
    <button type="submit">Shopping List <i class="fa-solid fa-basket-shopping"></i></button>
</form>

<button class="hamburger hamburger--collapse" type="button">
    <span class="hamburger-box">
        <span class="hamburger-inner"></span>
    </span>
</button>

<aside class="navigation">
    <nav>
        <h2>Recipello</h2>
        <ul>
            <li><a href="mainpage.php">Browse <i class="fa-solid fa-book"></i></a></li>
            <li><a href="#">Cook <i class="fa-solid fa-bowl-food"></i></a></li>
            <?php
            if (isset($_SESSION['userid'])) {
            ?>
            <li><a href="#">Favourites <i class="fa-solid fa-star"></i></a></li>
            <li><a href="my_recipes.php">My recipes <i class="fa-regular fa-pen-to-square"></i></a></li>
            <li><a href="current_user.php">Account <i class="fa-solid fa-user"></i></a></li>
            <?php
            } else {
            ?>
            <li><a href="login.php">Login <i class="fa-solid fa-user"></i></a></li>
            <li><a href="register.php">Register now! <i class="fa-solid fa-user"></i></a></li>
            <?php
            }
            if (isset($_SESSION['userid'])) {
            ?>
            <li><a href="../Includes/logout_includes.php">Log out <i class="fa-solid fa-right-from-bracket"></i></a></li>
            <?php
            }
            ?>
        </ul>
        <img src="Images/nav_bg.jpg" alt="nav_background">
    </nav>
</aside>

<script>
// Look for .hamburger
var hamburger = document.querySelector(".hamburger");
var navigation = document.querySelector(".navigation");
// On click
hamburger.addEventListener("click", () => {
    // Toggle class "is-active"
    hamburger.classList.toggle("is-active");
    // Do something else, like open/close menu
    navigation.classList.toggle("nav-active");
});
</script>