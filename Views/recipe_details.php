<?php session_start(); ?>
<?php require "header.php" ?>
<?php require "nav.php" ?>

<link rel="stylesheet" href="CSS/recipe_details.css">

<main class="col-xs-12 col-sm-10 col-md-6 col-lg-11">
    <div class="top_div">
        <div>
            <div class="h1_div">
                <h1>Spaghetti Bolognese</h1>
                <i class="fa-regular fa-heart"></i>
<!--                <i class="fa-solid fa-heart" style="color: #ff0000;"></i>-->
            </div>
            <div class="author_div">
                <img src="Images/banner.jpg">
                <p>User123#1</p>
            </div>
            <div class="author_div">
                <i class="fa-solid fa-note-sticky"></i>
                <p>italian, pasta</p>
            </div>
            <div class="author_div">
                <i class="fa-solid fa-clock"></i>
                <p>45 min</p>
            </div>
            <div class="author_div">
                <i class="fa-solid fa-seedling" style="color: #42f410;"></i>
                <i class="fa-solid fa-pepper-hot" style="color: #ff2600;"></i>
            </div>
        </div>
        <img src="Images/spaghetti_test.png">
    </div>
    <p>Popular <span class="chefs_p">chefs</span></p>

</main>