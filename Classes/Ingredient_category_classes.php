<?php

class Ingredient_category{
    private int $category_id;
    private string $name;

    public function __construct(int $category_id, string $name)
    {
        $this->category_id = $category_id;
        $this->name = $name;
    }

    public function getCategoryId(){
        return $this->category_id;
    }

    public function getCategoryName(){
        return $this->name;
    }
}