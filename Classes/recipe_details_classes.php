<?php

require 'recipe_classes.php';

class Recipe_details extends Dbh
{
    public static function getRecipe(string $hidden_title,string $hidden_user_id):Recipe
    {
        $dbh = new Dbh();
        $connection = $dbh->connect();

        $query = "SELECT * FROM recipes WHERE user_id = :user_id AND title = :title";
        $stmt = $connection->prepare($query);
        $stmt->bindValue(':user_id', (int)$hidden_user_id, PDO::PARAM_INT);
        $stmt->bindValue(':title', $hidden_title, PDO::PARAM_STR);
        $stmt->execute();
        $recipeData = $stmt->fetch(PDO::FETCH_ASSOC);

        if($recipeData){
            $recipe = new Recipe(
                $recipeData['title'],
                explode(',', $recipeData['categories']),
                (int) $recipeData['isVegan'],
                (int) $recipeData['isSpicy'],
                (int) $recipeData['time'],
                explode(',', $recipeData['ingredients']),
                (int) $recipeData['user_id'],
                $recipeData['methodOfPrep']
            );
        }
        return $recipe;
    }
    public static function addFavourites(int $id, int $user): void
    {
        $dbh = new Dbh();
        $connection = $dbh->connect();

        $query = "INSERT INTO favourites (recipe_id, uid) VALUES (:recipe_id, :user_id)";

        $stmt = $connection->prepare($query);



        $stmt->bindValue(':recipe_id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':user_id', $user, PDO::PARAM_INT);

        $stmt->execute();


    }


}
