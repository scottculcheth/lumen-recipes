<?php

namespace App\Gousto\Database;


interface RecipeSelectInterface
{
    public function getRecipeById($id);
    public function getRecipesByCuisine($cuisine);
}