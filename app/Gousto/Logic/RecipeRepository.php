<?php

namespace App\Gousto\Logic;

use App\Gousto\Database\Contract\RecipeSelectInterface;

// Not strictly useful here, however this aggregate layer allows for transformations should they be required later
// For example, before returning the recipe, or set of recipes for mobile, the data may be filtered to return less
// information as this cannot all be usefully displayed through the mobile app and would reduce the data transfer

class RecipeRepository
{
	protected $db;

	public function __construct(RecipeSelectInterface $db)
	{
		$this->db = $db;
	}

	public function getRecipeById($id)
    {
        $recipe = $this->db->getRecipeById($id);
        // If required, can inject Transformer here to return in the appropriate format
        // Frontend / Mobile edition of the data.
		return $recipe;
	}

	public function getRecipesByCuisine($cuisine, $page)
	{
	    $recipes = $this->db->getRecipesByCuisine($cuisine, $page);
		return $recipes;
	}

}