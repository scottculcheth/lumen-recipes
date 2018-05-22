<?php

namespace App\Gousto\Database\Contract;


interface RatingSelectInterface
{
    public function getRatingsCount();
    public function getRatingsCountByRecipe($recipe_id);
}