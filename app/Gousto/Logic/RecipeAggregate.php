<?php

namespace App\Gousto\Logic;


use App\Gousto\Database\Contract\RecipeInsertInterface;
use App\Gousto\Database\Contract\RecipeUpdateInterface;

class RecipeAggregate
{
    protected $insertdb;
    protected $updatedb;

    public function __construct(RecipeInsertInterface $insertdb,
                                RecipeUpdateInterface $updatedb)
    {
        $this->insertdb = $insertdb;
        $this->updatedb = $updatedb;
    }

    public function insertRecipe( $recipe )
    {
        // Validation would go here, and throw an Exception if not valid
        // The exception would be picked up by the core Handler and return a json response

        return $this->insertdb->insertRecipe($recipe);
    }

    public function updateRecipe( $recipe )
    {
        $this->updatedb->updateRecipe( $recipe );
    }

}