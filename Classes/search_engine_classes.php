<?php

class search_engine_classes extends Recipe
{
    public static function SearchRecipes(string $name): array
    {
        $dbh = new Dbh();
        $connection = $dbh->connect();

        $query = 'SELECT * FROM recipes  WHERE title = "'.$name.'"';
        $stmt = $connection->query($query);
        $recipesData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $recipes = [];
        foreach ($recipesData as $recipeData) {
            $recipe = new Recipe(
                $recipeData['title'],
                (int) $recipeData['category_id'],
                (int) $recipeData['isVegan'],
                (int) $recipeData['likesHot'],
                (float) $recipeData['rating'],
                (int) $recipeData['time'],
                explode(',', $recipeData['ingredients']),
                (int) $recipeData['user_id']
            );
            $recipes[] = $recipe;
        }

        return $recipes;
    }

}