<?php require "header.php" ?>

<!-- <form class="shopping_list" action="shopping_list.php" method="post">
    <button type="submit">Shopping List <i class="fa-solid fa-basket-shopping"></i></button>
</form> -->

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
            <?php
            if (isset($_SESSION['userid'])) {
                ?>
            <li><a href="cook.php">Cook <i class="fa-solid fa-bowl-food"></i></a></li>
            <li><a href="current_user_favourites.php">Favourites <i class="fa-solid fa-star"></i></a></li>
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
            <li><a href="../Includes/logout_includes.php">Log out <i class="fa-solid fa-right-from-bracket"></i></a>
            </li>
            <?php
            }
            ?>
        </ul>
        <img src="Images/nav_bg.jpg" alt="nav_background">
    </nav>
</aside>

<script>
var hamburger = document.querySelector(".hamburger");
var navigation = document.querySelector(".navigation");

hamburger.addEventListener("click", () => {
    hamburger.classList.toggle("is-active");
    navigation.classList.toggle("nav-active");
});
</script>