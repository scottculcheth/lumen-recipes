<?php

namespace App\Gousto\Logic\Contract;


interface RecipeValidatorInterface
{
    public function validateRecipe( $recipe );
}