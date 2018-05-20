<?php

namespace App\Gousto\Logic;


use App\Gousto\Database\Contract\RecipeInsertInterface;
use App\Gousto\Database\Contract\RecipeUpdateInterface;

class RecipeAggregate
{
    protected $insertdb;
    protected $updatedb;

    public function __construct(RecipeInsertInterface $insertdb, RecipeUpdateInterface $updatedb)
    {
        $this->insertdb = $insertdb;
        $this->updatedb = $updatedb;
    }

    public function insertRecipe( $recipe )
    {
        $this->insertdb->insertRecipe($recipe);
    }

    public function updateRecipe( $recipe )
    {
        $this->updatedb->updateRecipe( $recipe );
    }


}