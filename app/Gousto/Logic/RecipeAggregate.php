<?php

namespace App\Gousto\Logic;


use App\Gousto\Database\Contract\RecipeInsertInterface;
use App\Gousto\Database\Contract\RecipeUpdateInterface;
use App\Gousto\Logic\Contract\RecipeValidatorInterface;
use App\Gousto\Model\Recipe;

class RecipeAggregate
{
    protected $insertdb;
    protected $updatedb;
    protected $validator;

    public function __construct(RecipeInsertInterface $insertdb,
                                RecipeUpdateInterface $updatedb,
                                RecipeValidatorInterface $validator)
    {
        $this->insertdb = $insertdb;
        $this->updatedb = $updatedb;
        $this->validator = $validator;
    }

    public function insertRecipe( $recipe )
    {
        // Validation class called here, and throws an Exception if not valid
        // The exception is picked up by the core Handler and return a json response
        $this->validator->validateRecipe($recipe);

        return $this->insertdb->insertRecipe($recipe);
    }

    public function updateRecipe( $recipe )
    {
        // Would validate here too, may be subject to different rules depending on req's
        $this->updatedb->updateRecipe( $recipe );
    }

}