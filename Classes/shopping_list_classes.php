<?php
require 'recipe_classes.php';
class shopping_list_classes extends Dbh
{
    public static function addShoppingList(string $hidden_title, string $hidden_user_id){
        $dbh = new Dbh();
        $connection = $dbh->connect();


        $query = "SELECT ingredients FROM recipes WHERE user_id = :user_id AND title = :title";
        $stmt = $connection->prepare($query);
        $stmt->bindValue(':user_id', (int)$hidden_user_id, PDO::PARAM_INT);
        $stmt->bindValue(':title', $hidden_title, PDO::PARAM_STR);
        $stmt->execute();
        $recipeData = $stmt->fetch(PDO::FETCH_ASSOC);

        if(isset($_SESSION['shopping_list'])){
            if($recipeData){
                $_SESSION['shopping_list'] = array_merge($_SESSION['shopping_list'], explode(',', $recipeData['ingredients']));
            }
        }
        else{
            if($recipeData){
                $_SESSION['shopping_list'] = explode(',', $recipeData['ingredients']);
            }
        }

    }

    public static function clearShoppingList(){
        if (isset($_SESSION['shopping_list'])) {
            unset($_SESSION['shopping_list']);
        }
    }

    public static function removeShoppingListElement(string $ingredient){
        $index = array_search($ingredient, $_SESSION['shopping_list']);
         unset($_SESSION['shopping_list'][$index]);
         if(count($_SESSION['shopping_list']) == 0){
             unset($_SESSION['shopping_list']);
         }
    }
}