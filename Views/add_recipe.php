<?php session_start();
if (!isset($_SESSION['userid'])) {
    header("location: ../Views/mainpage.php");
}
?>
<?php require "nav.php" ?>
<?php require_once '../Classes/Ingredient_classes.php' ?>
<?php require_once '../Classes/Ingredient_category_classes.php' ?>

<main class="loggedIn add_recipe">
    <h1>Add new recipe</h1>
    <section>
        <form method="post" action="../Includes/add_recipe_includes.php">
            <div class="title">
                <label for="titleOfRecipe">Title of Recipe</label>
                <input type="text" name="titleOfRecipe" placeholder="Title">
            </div>
            <div class="categories">
                <label>Categories</label>
                <p style="display: none;"></p>
                <input type="hidden" name="categories[]" id="categories_hidden" value="">
                <button class="btn-primary" id="change_categories_button" type="button">Set categories</button>
            </div>
            <div class="checks">
                <input type="checkbox" name="isSpicy">
                <label for="spicy">Spicy</label>
                <input type="checkbox" name="isVegan">
                <label for="vege">Vege</label>
            </div>
            <div class="time">
                <label for="time">Time to cook</label>
                <input type="text" name="time" placeholder="(in minutes)">
            </div>
            <h2>Ingredients</h2>
            <div class="ingredients">
                <?php
                $ingredients_categories = Ingredient::getAllCategories();
                foreach ($ingredients_categories as $category) {
                    echo
                    "<ul class='ingredients_category col-xs-12'>
                     <h3>" . $category->getCategoryName() . "</h3>";
                    $ingredients = Ingredient::getIngredients($category->getCategoryId());
                    foreach ($ingredients as $ingredient) {
                        echo "<li class='ingredients_category_item'>";
                        echo "<input type='checkbox' name='ingredient[]' value='" . $ingredient->getName() . "'>";
                        echo "<label>" . $ingredient->getName() . "</label>";
                        echo "</li>";
                    }
                    echo "</ul>";
                }
                ?>
            </div>
            <div class="recipe">
                <label for="methodOfPrep">Method of Preparation</label>
                <span id="methodOfPrep" class="textarea" role="textbox" contenteditable></span>
                <input type="hidden" name="methodOfPrep" id="methodOfPrep_hidden" value="">
            </div>
            <div class="photo">
                <label for="photo">Choose a photo (JPEG or PNG only):</label>
                <input type="file" name="photo" id="photo" accept=".jpeg, .jpg, .png, image/jpeg, image/png">
            </div>
            <button name="add_recipe_button" class="btn-primary" type="submit">Add recipe!</button>
        </form>
    </section>

    <section class="categories_checklist_block" id="categories_checklist">
        <form method="POST" action="process_form.php">
            <?php
            require_once '../Classes/recipe_category_classes.php';
            $categories = Recipe_category::getAllRecipeCategories();
            foreach ($categories as $category) {
                echo "
            <div class='categories'>
                <input type='checkbox' name='categories[]' value='" . $category->getCategoryName() . "'>
                <label>" . $category->getCategoryName() . "</label>
            </div>";
            }                           
            ?>
            <button class="save_changes_button btn-primary" id="categories_save_button" type="button">Save
                changes</button>
        </form>
    </section>

</main>

<script>
var body = document.querySelector('body');

var change_categories_button = document.getElementById("change_categories_button");
var categories_checklist = document.getElementById("categories_checklist");
categories_checklist.style.display = "none";
body.style.overflow = "visible";
var categories_list = document.querySelectorAll('.categories');
var selected_categories = [];
let categories_input = document.querySelector('.categories p');
let categories_label = document.querySelector('.categories label');

change_categories_button.addEventListener("click", () => {
    categories_checklist.style.display = (categories_checklist.style.display === "none" ?
        "block" : "none");
    body.style.overflow = (body.style.overflow === "visible" ?
        "hidden" : "visible");
    window.scrollTo(0, 0);
});

if (document.querySelector('body').offsetWidth >= 992) categories_label.style.display = "none";

var save_categories_button = document.querySelector('.save_changes_button');

save_categories_button.addEventListener("click", () => {
    categories_input.innerHTML = "";
    categories_hidden.value = "";
    selected_categories = [];
    if (categories_checklist.style.display === "block") {
        categories_checklist.style.display = "none";
        body.style.overflow = "visible";
        categories_list.forEach(element => {
            if (element.children[0].checked) {
                selected_categories.push(element.children[1].innerHTML);
                // console.log(selected_categories);
            }
        });

        // console.log(document.querySelector('body').offsetWidth);
        // console.log(selected_categories);
        // if (document.querySelector('body').offsetWidth >= 992) {
        // }
        categories_input.style.display = "block";
        categories_label.style.display = "block";
    }
    for (let i = 0; i < selected_categories.length; i++) {
        if (i < selected_categories.length - 1) {
            categories_input.innerHTML += selected_categories[i] + ', ';
            categories_hidden.value += selected_categories[i] + ', ';
        } else {
            categories_input.innerHTML += selected_categories[i];
            categories_hidden.value += selected_categories[i];
        }
    }
});

// var description_span = document.querySelector('.description span.textarea');
// var description_input = document.querySelector('input#description_hidden');

// description_span.addEventListener("keyup", () => {
//     description_input.value = description_span.innerHTML;
//     // console.log(description_input.value);
// });

var methodOfPrep_span = document.querySelector('.recipe span.textarea');
var methodOfPrep_input = document.querySelector('input#methodOfPrep_hidden');

methodOfPrep_span.addEventListener("keyup", () => {
    methodOfPrep_input.value = methodOfPrep_span.innerHTML;
    // console.log(methodOfPrep_input.value);
});
</script>