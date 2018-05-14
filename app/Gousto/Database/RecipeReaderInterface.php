<?php

namespace App\Gousto\Database;


interface RecipeReaderInterface
{
    public function getRecipeById($id);
    public function getRecipesByCuisine($cuisine);
}