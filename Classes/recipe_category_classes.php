<?php

class Recipe_category extends Dbh
{
    private int $category_id;
    private string $category_name;

    public function __construct(int $category_id, string $category_name = "a")
    {
        $this->category_id = $category_id;
        $this->category_name = $category_name;
    }

    public static function getAllRecipeCategories(): array
    {
        $dbh = new Dbh();
        $connection = $dbh->connect();

        $query = 'SELECT * FROM categories';
        $stmt = $connection->query($query);
        $categoriesData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $categories = [];
        foreach ($categoriesData as $categoryData) {
            $category = new Recipe_category(
                (int)$categoryData['category_id'],
                $categoryData['category_name']
            );
            $categories[] = $category;
        }
        return $categories;
    }
    public function getCategoryId(): int
    {
        return $this->category_id;
    }
    public function getCategoryName(): string
    {
        return $this->category_name;
    }
}
