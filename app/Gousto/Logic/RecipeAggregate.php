<?php

namespace App\Gousto\Logic;


use App\Gousto\Database\Contract\RecipeInsertInterface;

class RecipeAggregate
{
    protected $db;

    public function __construct(RecipeInsertInterface $db )
    {
        $this->db = $db;
    }

    public function insertRecipe( $recipe )
    {
        $this->db->insertRecipe($recipe);
    }


}