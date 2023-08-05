<?php require "nav.php" ?>
<link rel="stylesheet" href="CSS/add_recipe.css">

<main>
    <section>
        <form>
            <div class="container col-xs-8">
                <div class="title">
                    <label for="titleOfRecipe">Title of Recipe</label>
                    <input type="text" name="titleOfRecipe" placeholder="Title">
                </div>
                <div class="categories">
                    <div style='width: 200px; height: 200px;'>Categories</div>
                </div>
                <div class="checks">
                    <label for="spicy">Spicy</label>
                    <input type="checkbox" name="spicy">
                    <label for="vege">Vege</label>
                    <input type="checkbox" name="vege">
                </div>
                <div class="time">
                    <label for="time">Time to cook</label>
                    <input type="text" name="time" placeholder="(in minutes)">
                </div>
                <div class="description">
                    <label for="description">Description</label>
                    <textarea name="description"></textarea>
                </div>
                <div class="ingredients">
                    <div style='width: 200px; height: 200px;'>Ingredients</div>
                </div>
                <div class="recipe">
                    <div style='width: 200px; height: 200px;'>Recipe</div>
                </div>
                <div class="photo">
                    <div style='width: 200px; height: 200px;'>Photo</div>
                </div>
            </div>

        </form>
    </section>
</main>