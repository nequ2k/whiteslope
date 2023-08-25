<?php
declare(strict_types=1);
require 'dbh_classes.php';
class Recipe extends \Dbh
{
    private string $title;
    private array $categories;
    private int $is_vegan;
    private int $is_spicy;
    private int $time;
    private array $ingredients;
    private int $user_id;
    private string $methodOfPrep = "";


    public function __construct(string $title, array $categories, int $is_vegan, int $is_spicy, int $time, array $ingredients, int $user_id, $methodOfPrep)
    {
        $this->title = $title;
        $this->categories= $categories;
        $this->is_vegan = $is_vegan;
        $this->is_spicy = $is_spicy;
        $this->time = $time;
        $this->ingredients = $ingredients;
        $this->user_id = $user_id;
        $this->methodOfPrep = $methodOfPrep;

    }
    public static function getRecipes(?string $name): array
    {
        $dbh = new Dbh();
        $connection = $dbh->connect();

        $query = 'SELECT * FROM recipes WHERE title LIKE :name';
        $stmt = $connection->prepare($query);
        $stmt->bindValue(':name', '%' . $name . '%', PDO::PARAM_STR);
        $stmt->execute();
        $recipesData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $recipes = [];
        foreach ($recipesData as $recipeData) {
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
            $recipes[] = $recipe;
        }

        return $recipes;
    }



    public static function getTrendingRecipes(int $count): array
    {
        $dbh = new Dbh();
        $connection = $dbh->connect();

        $query = 'SELECT * FROM recipes LIMIT '.$count;
        $stmt = $connection->query($query);
        $recipesData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $recipes = [];
        foreach ($recipesData as $recipeData) {
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
            $recipes[] = $recipe;
        }

        return $recipes;
    }
    public static function addRecipe(Recipe $recipe):void{
        $dbh = new Dbh();
        $connection = $dbh->connect();

        $query = "INSERT INTO recipes (title, categories, isVegan , isSpicy ,time, ingredients, user_id, methodOfPrep) VALUES (:title,:categories,:isVegan,:isSpicy,:time,:ingredients,:user_id,:method)";

        $stmt = $connection->prepare($query);

        $stmt->bindValue(':title',$recipe->getTitle(),PDO::PARAM_STR);
        $stmt->bindValue(':categories', $recipe->getCategoriesAsString(), PDO::PARAM_STR);
        $stmt->bindValue(':isVegan',$recipe->getIsVegan(),PDO::PARAM_INT);
        $stmt->bindValue(':isSpicy',$recipe->getIsSpicy(),PDO::PARAM_INT);
        $stmt->bindValue(':time',$recipe->getTime(),PDO::PARAM_INT);
        $stmt->bindValue(':ingredients',$recipe->getIngredientsAsString(),PDO::PARAM_STR);
        $stmt->bindValue(':user_id',$recipe->getUserId(),PDO::PARAM_INT);
        $stmt->bindValue(':method',$recipe->getMethodOfPrep(),PDO::PARAM_STR);

        $stmt->execute();
    }

    public function getIngredientsAsString():string{
        $temp_ingredients = $this->getIngredients();
        $str = $temp_ingredients[0];
        for($i = 1; $i < count($temp_ingredients); $i++){
            $str .= ", ".$temp_ingredients[$i];
        }
        return $str;
    }
    public function getCategoriesAsString():string{
        $temp_categories = $this->getCategories();
        $str = $temp_categories[0];
        for($i = 1; $i < count($temp_categories); $i++){
            $str .= ", ".$temp_categories[$i];
        }
        return $str;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getCategories(): array
    {
        return $this->categories;
    }

//    public function getCategory(): string
//    {
//        $dbh = new Dbh();
//        $connection = $dbh->connect();
//        $query = 'SELECT * FROM categories WHERE category_id = '.$this->category_id;
//        $stmt = $connection->query($query);
//        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
//
//        return $data[0]['category_name'];
//    }

    public function getIsVegan(): int
    {
        return $this->is_vegan;
    }

    public function getIsSpicy(): int
    {
        return $this->is_spicy;
    }

    public function getIngredients(): array
    {
        return $this->ingredients;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function getUsername(): string
    {
        $dbh = new Dbh();
        $connection = $dbh->connect();
        $query = 'SELECT * FROM users WHERE users_id = '.$this->user_id;
        $stmt = $connection->query($query);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (isset($data[0]['users_user_name'])) {
            return $data[0]['users_user_name'];
        } else {
            return '';
        }
    }


    public function getTime(): int
    {
        return $this->time;
    }

    public function getMethodOfPrep():string
    {
        return $this->methodOfPrep;
    }


}