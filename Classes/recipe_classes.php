<?php
declare(strict_types=1);
require 'dbh_classes.php';
class Recipe extends \Dbh
{
    private string $title;
    private int $category_id;
    private int $is_vegan;
    private int $likes_hot;
    private float $time;
    private array $ingredients;
    private int $user_id;


    public function __construct(string $title, int $category_id, int $is_vegan, int $likes_hot, int $time, array $ingredients, int $user_id)
    {
        $this->title = $title;
        $this->category_id = $category_id;
        $this->is_vegan = $is_vegan;
        $this->likes_hot = $likes_hot;
        $this->time = $time;
        $this->ingredients = $ingredients;
        $this->user_id = $user_id;

    }
    public static function getAllRecipes(): array
    {
        $dbh = new Dbh();
        $connection = $dbh->connect();

        $query = 'SELECT * FROM recipes';
        $stmt = $connection->query($query);
        $recipesData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $recipes = [];
        foreach ($recipesData as $recipeData) {
            $recipe = new Recipe(
                $recipeData['title'],
                (int) $recipeData['category_id'],
                (int) $recipeData['isVegan'],
                (int) $recipeData['likesHot'],
                (int) $recipeData['time'],
                explode(',', $recipeData['ingredients']),
                (int) $recipeData['user_id']
            );
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

    public function getCategory(): string
    {
        $dbh = new Dbh();
        $connection = $dbh->connect();
        $query = 'SELECT * FROM categories WHERE category_id = '.$this->category_id;
        $stmt = $connection->query($query);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data[0]['category_name'];
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
        return 1;
    }




}