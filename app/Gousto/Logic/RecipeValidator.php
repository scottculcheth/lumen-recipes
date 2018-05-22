<?php

namespace App\Gousto\Logic;


use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use App\Gousto\Logic\Contract\RecipeValidatorInterface;

class RecipeValidator implements RecipeValidatorInterface
{
    public function validateRecipe($recipe)
    {
        $this->validateTitle($recipe['title']);
        $this->validateCalories($recipe['calories_kcal']);
    }

    protected function validateTitle($title)
    {
        if(is_numeric($title)){
            throw new BadRequestHttpException("Title was Incorrect"); // Could implement full custom Exceptions here depending on req's
        }
    }

    protected function validateCalories($calories)
    {
        if(!is_numeric($calories)){
            throw new BadRequestHttpException( "Calories was Incorrect" );
        }
    }

    //etc
}