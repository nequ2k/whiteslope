<?php

require 'recipe_classes.php';

class Recipe_details extends Dbh
{
    public static function getRecipe(string $hidden_title,string $hidden_user_id):Recipe
    {
        $dbh = new Dbh();
        $connection = $dbh->connect();

        $query = "SELECT * FROM recipes WHERE user_id = :user_id AND title = :title";
        $stmt->bindValue(':user_id', (int)$hidden_user_id, PDO::PARAM_INT);
        $stmt->bindValue(':title', $hidden_title, PDO::PARAM_STR);
        $stmt = $connection->prepare($query);

        $stmt->execute();
        $recipeData = $stmt->fetch(PDO::FETCH_ASSOC);

        if($recipeData){
            $recipe = new Recipe(
                $recipeData['title'],
                (int) $recipeData['category_id'],
                (int) $recipeData['isVegan'],
                (int) $recipeData['likesHot'],
                (int) $recipeData['time'],
                (float) $recipeData['rating'],
                explode(',', $recipeData['ingredients']),
                (int) $recipeData['user_id']
            );
        }
        return $recipe;
    }
}