<?php

namespace App\Gousto\Database\Contract;


interface RecipeSelectInterface
{
    public function getRecipeById($id);
    public function getRecipesByCuisine($cuisine);
}