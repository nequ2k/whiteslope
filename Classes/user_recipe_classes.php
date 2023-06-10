<?php
require_once 'dbh_classes.php';
class UserRecipe extends Dbh
{
private int $userId;

public function __construct(int $userId)
{
$this->userId = $userId;
}

public function getUserRecipes(): array
{
$connection = $this->connect();

$query = 'SELECT * FROM recipes WHERE user_id = :userId';
$stmt = $connection->prepare($query);
$stmt->bindValue(':userId', $this->userId, PDO::PARAM_INT);
$stmt->execute();
$recipesData = $stmt->fetchAll(PDO::FETCH_ASSOC);

$recipes = [];
foreach ($recipesData as $recipeData) {
$recipe = new Recipe(
$recipeData['title'],
(int) $recipeData['category_id'],
(int) $recipeData['isVegan'],
(int) $recipeData['likesHot'],
(float) $recipeData['rating'],
explode(',', $recipeData['ingredients']),
(int) $recipeData['user_id']
);
$recipes[] = $recipe;
}

return $recipes;
}
}

?>
