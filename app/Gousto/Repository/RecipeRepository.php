<?php

namespace App\Gousto\Repository;

use App\Gousto\Database\RecipeCsvReaderService;
use App\Gousto\Model\RecipeFull;

class RecipeRepository
{
	protected $db;

	public function __construct(RecipeCsvReaderService $db) 
	{
		$this->db = $db;
	}

	public function getRecipeById($id)
	{
		$record = $this->db->getRecipeById($id);
        $recipe = RecipeFull::createFromArray($record);
		return $recipe;
	}

	public function getRecipesByCuisine($cuisine)
	{
		$records = $this->db->getRecipesByCuisine($cuisine);
		$recipes = [];

        foreach( $records as $offset => $record )
        {
            $recipes[] = RecipeFull::createFromArray($record);
        }

		return $recipes;
	}

}