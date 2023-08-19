<?php session_start(); ?>
<?php require "header.php" ?>
<?php require "nav.php" ?>
<?php require_once '../Classes/shopping_list_classes.php'; ?>


<link rel="stylesheet" href="CSS/shopping_list.css">
<main>
    <?php
    if (isset($_POST["remove_shopping_list_element"])) {
        shopping_list_classes::removeShoppingListElement($_POST['shopping_list_element_to_remove']);
        header("location: ../Views/shopping_list.php");
    }
    if (isset($_POST["clear_shopping_list"])) {
        shopping_list_classes::clearShoppingList();
        header("location: ../Views/shopping_list.php");
    }
    ?>
    <h1>Your shopping list:</h1>
    <?php
        if (isset($_POST["shopping_list_button"])) {
            shopping_list_classes::addShoppingList($_POST["hidden_title"], $_POST["hidden_user_id"]);
        }

        if(isset($_SESSION['shopping_list'])){
            foreach($_SESSION['shopping_list'] as $ingredient){
                echo "
                <form  action='shopping_list.php' method='post'>
                    <input type='hidden' name='shopping_list_element_to_remove' value='$ingredient'>
                <div class='remove'>
                    $ingredient
                    <button name='remove_shopping_list_element'><i class='fa-solid fa-trash'></i></button>
                </div>
                </form>
                
                ";
            }
            echo "
                <form action='shopping_list.php' method='post'>
                    <button class='clear' name='clear_shopping_list'>Clear your shopping list</button>
                </form>
                <form>
                    <button class='search_in_markets'><i class='fa-solid fa-skull'></i>Search in markets<i class='fa-solid fa-skull'></i></button>
                </form>";
            
        }
        else echo "<p>You have not added anything to your shopping list yet</p>";

    ?>
    
   
</main>
