<?php

declare(strict_types=1);

require_once('dbh_classes.php');

class Recipe extends \Dbh
{
    private string $title;
    private array $categories;
    private int $is_vegan;
    private int $is_spicy;
    private int $time;
    private array $ingredients;
    private int $user_id;
    private string $methodOfPrep;
    private int $id;


    public function __construct(string $title, array $categories, int $is_vegan, int $is_spicy, int $time, array $ingredients, int $user_id, $methodOfPrep, int $id = -1)
    {
        $this->title = $title;
        $this->categories = $categories;
        $this->is_vegan = $is_vegan;
        $this->is_spicy = $is_spicy;
        $this->time = $time;
        $this->ingredients = $ingredients;
        $this->user_id = $user_id;
        $this->methodOfPrep = $methodOfPrep;
        $this->id = $id;
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
                $recipeData['methodOfPrep'],
            );
            $recipes[] = $recipe;
        }

        return $recipes;
    }
    public static function getRecipesByIngredients(array $ingredients):array{
        $dbh = new Dbh();
        $connection = $dbh->connect();
        $query = 'SELECT * FROM recipes';
        $stmt = $connection->query($query);
        $recipesData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $recipes = [];
        foreach ($recipesData as $recipeData) {
            $recipe = new Recipe(
                $recipeData['title'],
                explode(',', $recipeData['categories']),
                (int)$recipeData['isVegan'],
                (int)$recipeData['isSpicy'],
                (int)$recipeData['time'],
                explode(',', $recipeData['ingredients']),
                (int)$recipeData['user_id'],
                $recipeData['methodOfPrep'],
                $recipeData['recipe_id']
            );
            $recipes[] = $recipe;
        }
        $pairs = [];
        $k = 0;
        foreach ($recipes as $recipe){
            $r_ingredients = $recipe->getIngredients();
            for($i = 0; $i < count($r_ingredients); $i++){
                for($j = 0; $j < count($ingredients); $j++){
                    if(($ingredients[$j] == $r_ingredients[$i]) OR " ".$ingredients[$j] == $r_ingredients[$i]) {
                        $k++;
                        break;
                    }
                }
            }
            $pairs [] = array($recipe, $k);
            $k = 0;
        }

        uasort($pairs, function ($a, $b) {
            return $b[1] - $a[1];
        });

        return $pairs;
    }
    public static function getPreferencesById(int $id):array{
        $dbh = new Dbh();
        $connection = $dbh->connect();

        $query = 'SELECT preference FROM user_preferences WHERE user_id = :id';
        $stmt = $connection->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $preferencesData = $stmt->fetch(PDO::FETCH_ASSOC);
        $preferences = [];
        if($preferencesData!=null){
            return explode((","),$preferencesData['preference']);
        }
        return array("nullPreferences");
    }
    public static function getRecipesByPreferences(int $id):array{

        $preferences = self::getPreferencesById($id);
        if($preferences == array("nullPreferences")) return array("nullPreferences");
        $dbh = new Dbh();
        $connection = $dbh->connect();
        $recipes = [];

        $query = 'SELECT * FROM recipes';
        $stmt = $connection->query($query);
        $recipesData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($recipesData as $recipeData) {
            $recipe = new Recipe(
                $recipeData['title'],
                explode(',', $recipeData['categories']),
                (int)$recipeData['isVegan'],
                (int)$recipeData['isSpicy'],
                (int)$recipeData['time'],
                explode(',', $recipeData['ingredients']),
                (int)$recipeData['user_id'],
                $recipeData['methodOfPrep'],
                $recipeData['recipe_id']
            );
            $recipes[] = $recipe;
        }

        $finalRecipes = [];
        $flag = false;
        foreach($recipes as $recipe){
            foreach($recipe->getCategories() as $category){
                for($i = 0; $i < count($preferences); $i++){
                    if($category == $preferences[$i] OR " ".$category==$preferences[$i]){
                        $finalRecipes[] = $recipe;
                        $flag = true;
                    }
                    if($flag) break;
                }
                if($flag) break;
            }
            $flag = false;
        }
        shuffle($finalRecipes);
        return $finalRecipes;
    }

    public static function getChefs(string $chef){
        $dbh = new Dbh();
        $connection = $dbh->connect();

        $query = 'SELECT * FROM users WHERE ';
        $stmt = $connection->query($query);
        $recipesData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function getTrendingRecipes(int $x): array
    {
        $dbh = new Dbh();
        $connection = $dbh->connect();

        $query = 'SELECT * FROM recipes';
        $stmt = $connection->query($query);
        $recipesData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $recipes = [];
        $pairs = [];

        foreach ($recipesData as $recipeData) {
            $recipe = new Recipe(
                $recipeData['title'],
                explode(',', $recipeData['categories']),
                (int)$recipeData['isVegan'],
                (int)$recipeData['isSpicy'],
                (int)$recipeData['time'],
                explode(',', $recipeData['ingredients']),
                (int)$recipeData['user_id'],
                $recipeData['methodOfPrep'],
                $recipeData['recipe_id']
            );

            $pair = array($recipe, self::setFinalRating($recipe));

            $pairs[] = $pair;
        }
        uasort($pairs, function ($a, $b) {
            return $b[1] - $a[1];
        });

        $i = 0;
        $recipes = [];
        foreach ($pairs as $pair) {
            $recipes[] = $pair[0];
            $i++;
            if ($i == $x) break;
        }
        return $recipes;
    }
    public static function getFavouriteRecipes($user): array
    {
        $dbh = new Dbh();
        $connection = $dbh->connect();

        $query = 'SELECT r.*
FROM recipes r
JOIN favourites f ON r.recipe_id = f.recipe_id
WHERE '.$user.' = f.uid; ';
        $stmt = $connection->query($query);
        $recipesData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $recipes = [];
        $pairs = [];

        foreach ($recipesData as $recipeData) {
            $recipe = new Recipe(
                $recipeData['title'],
                explode(',', $recipeData['categories']),
                (int)$recipeData['isVegan'],
                (int)$recipeData['isSpicy'],
                (int)$recipeData['time'],
                explode(',', $recipeData['ingredients']),
                (int)$recipeData['user_id'],
                $recipeData['methodOfPrep'],
                $recipeData['recipe_id']
            );

            $pair = array($recipe, self::setFinalRating($recipe));

            $pairs[] = $pair;
        }
        uasort($pairs, function ($a, $b) {
            return $b[1] - $a[1];
        });

        $i = 0;
        $recipes = [];
        foreach ($pairs as $pair) {
            $recipes[] = $pair[0];
            $i++;
            if ($i == 10) break;
        }
        return $recipes;
    }

    public static function setFinalRating(Recipe $recipe)
    {
        $rating = $recipe->getRating();
        $users = $recipe->getRatingUsersCount();
        $fuzzy_rating = 1;
        $fuzzy_users = 1;


        if ($rating <= 3) $fuzzy_rating = 1;
        else if (($rating > 3) && ($rating <= 4)) $fuzzy_rating = 2;
        else if (($rating > 4) && ($rating <= 5)) $fuzzy_rating = 3;
        $fuzzy_rating = 0;


        if ($users <= 5) $fuzzy_users = 1;
        else if (($users > 50) && ($users <= 10)) $fuzzy_users = 2;
        else if ($users > 15) $fuzzy_users = 3;
        $fuzzy_users = 0;

        if ($rating == 1) return 1;
        else if (($rating == 2) && ($users == 2)) return 2;
        else if (($rating == 2) && ($users == 3)) return 3;
        else if (($rating == 3) && ($users == 2)) return 3;
        else if (($rating == 2) && ($users == 1)) return 1;
        else if (($rating == 3) && ($users == 1)) return 2;
        else if (($rating == 3) && ($users == 3)) return 3;
        return 0;
    }

    public static function addRecipe(Recipe $recipe): void
    {
        $dbh = new Dbh();
        $connection = $dbh->connect();

        $query = "INSERT INTO recipes (title, categories, isVegan , isSpicy ,time, ingredients, user_id, methodOfPrep) VALUES (:title,:categories,:isVegan,:isSpicy,:time,:ingredients,:user_id,:method)";

        $stmt = $connection->prepare($query);

        $stmt->bindValue(':title', $recipe->getTitle(), PDO::PARAM_STR);
        $stmt->bindValue(':categories', $recipe->getCategoriesAsString(), PDO::PARAM_STR);
        $stmt->bindValue(':isVegan', $recipe->getIsVegan(), PDO::PARAM_INT);
        $stmt->bindValue(':isSpicy', $recipe->getIsSpicy(), PDO::PARAM_INT);
        $stmt->bindValue(':time', $recipe->getTime(), PDO::PARAM_INT);
        $stmt->bindValue(':ingredients', $recipe->getIngredientsAsString(), PDO::PARAM_STR);
        $stmt->bindValue(':user_id', $recipe->getUserId(), PDO::PARAM_INT);
        $stmt->bindValue(':method', $recipe->getMethodOfPrep(), PDO::PARAM_STR);

        $stmt->execute();
    }


    public static function getRecipeIdFromDataBase($title)
    {
        $dbh = new Dbh();
        $connection = $dbh->connect();

        $query = "SELECT recipe_id FROM recipes WHERE title = :title";
        $stmt = $connection->prepare($query);
        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->execute();
        $recipeData = $stmt->fetch(PDO::FETCH_ASSOC);

        return $recipeData['recipe_id'] ?? 1;
    }
    public function getRating()
    {
        $dbh = new Dbh();
        $connection = $dbh->connect();

        $id = self::getRecipeIdFromDataBase($this->getTitle());

        $query = "SELECT rating FROM ratings WHERE recipe_id = :id";
        $stmt = $connection->prepare($query);
        $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
        $stmt->execute();
        $ratingsData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $ratings = [];

        foreach ($ratingsData as $ratingData) {
            $ratings[] = (float)$ratingData['rating'];
        }
        if (count($ratings) != 0) return round(array_sum($ratings) / count($ratings), 1);

        return .0;
    }
    public function getRatingUsersCount()
    {
        $dbh = new Dbh();
        $connection = $dbh->connect();

        $id = self::getRecipeIdFromDataBase($this->getTitle());

        $query = "SELECT COUNT(user_id) AS users FROM ratings WHERE recipe_id = :id";
        $stmt = $connection->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $recipeData = $stmt->fetch(PDO::FETCH_ASSOC);
        $users = $recipeData['users'] ?? 1;

        return $users;
    }

    public function getIngredientsAsString(): string
    {
        $temp_ingredients = $this->getIngredients();
        $str = $temp_ingredients[0];
        for ($i = 1; $i < count($temp_ingredients); $i++) {
            $str .= ", " . $temp_ingredients[$i];
        }
        return $str;
    }
    public function getCategoriesAsString(): string
    {
        $temp_categories = $this->getCategories();
        $str = $temp_categories[0];
        for ($i = 1; $i < count($temp_categories); $i++) {
            $str .= ", " . $temp_categories[$i];
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

    // public function getCategory(): string
    // {
    //     $dbh = new Dbh();
    //     $connection = $dbh->connect();
    //     $query = 'SELECT * FROM categories WHERE category_id = ' . $this->category_id;
    //     $stmt = $connection->query($query);
    //     $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //     return $data[0]['category_name'];
    // }


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
        $query = 'SELECT * FROM users WHERE users_id = ' . $this->user_id;
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
    public function getId(): int
    {
        return $this->id;
    }

    public function getMethodOfPrep(): string
    {
        return $this->methodOfPrep;
    }
}
