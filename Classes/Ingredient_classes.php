<?php
require 'dbh_classes.php';
require 'Ingredient_category_classes.php';

class Ingredient extends Dbh
{
    private string $name;
    private int $category_id;

    public function __construct(string $name, int $category_id)
    {
        $this->name = $name;
        $this->category_id = $category_id;
    }
    public static function getIngredients($product_category_id){
        $dbh = new Dbh();
        $connection = $dbh->connect();

        $query = "SELECT name, product_category_id FROM products WHERE product_category_id = :P_C_ID";
        $stmt = $connection->prepare($query);
        $stmt->bindValue(':P_C_ID',$product_category_id,PDO::PARAM_INT);
        $stmt->execute();
        $ingredientsData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $ingredients = [];
        foreach ($ingredientsData as $ingredientData) {
            $ingredient = new Ingredient($ingredientData['name'], (int)$ingredientData['product_category_id']);
            $ingredients[] = $ingredient;
        }
        return $ingredients;


    }
    public static function getAllCategories()
    {

        $dbh = new Dbh();
        $connection = $dbh->connect();

        $query = "SELECT product_category_id, category FROM product_category";
        $stmt = $connection->prepare($query);
        $stmt->execute();
        $categoriesData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $categories = [];
        foreach ($categoriesData as $categoryData) {
            $category = new Ingredient_category((int)$categoryData['product_category_id'], $categoryData['category']);
            $categories[] = $category;
        }

        return $categories;
    }

    public function getName(){
        return $this->name;
    }
}