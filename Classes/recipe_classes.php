<?php
declare(strict_types=1);
require 'dbh_classes.php';
class Recipe extends \Dbh
{
    private string $title;
    private int $category_id;
    private int $is_vegan;
    private int $likes_hot;
    private float $rating;
    private array $ingredients;
    private int $user_id;


    public function __construct(string $title, int $category_id, int $is_vegan, int $likes_hot, float $rating, array $ingredients, int $user_id)
    {
        $this->title = $title;
        $this->category_id = $category_id;
        $this->is_vegan = $is_vegan;
        $this->likes_hot = $likes_hot;
        $this->rating = $rating;
        $this->ingredients = $ingredients;
        $this->user_id = $user_id;

    }
    public static function getAllRecipes(): array
    {
        $dbh = new self();
        $connection = $dbh->connect();

        $query = 'SELECT * FROM recipes';
        $stmt = $connection->query($query);
        $recipesData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $recipes = [];
        foreach ($recipesData as $recipeData) {
            $recipe = new Recipe();
            $recipe->title = $recipeData['title'];
            $recipe->category_id = (int) $recipeData['category_id'];
            $recipe->is_vegan = (int) $recipeData['isVegan'];
            $recipe->likes_hot = (int) $recipeData['likesHot'];
            $recipe->rating = (float) $recipeData['rating'];
            $recipe->ingredients = explode(',', $recipeData['ingredients']);
            $recipe->user_id = (int) $recipeData['user_id'];
            $recipes[] = $recipe;
        }

        return $recipes;
    }
    public function getTitle(): string
    {
        return $this->title;
    }

    public function getCategoryId(): int
    {
        return $this->category_id;
    }

    public function getIsVegan(): int
    {
        return $this->is_vegan;
    }

    public function getLikesHot(): int
    {
        return $this->likes_hot;
    }

    public function getRating(): float
    {
        return $this->rating;
    }

    public function getIngredients(): array
    {
        return $this->ingredients;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }


}