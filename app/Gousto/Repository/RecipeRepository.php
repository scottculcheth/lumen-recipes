<?php

namespace App\Gousto\Repository;

use App\Gousto\Database\RecipeReaderInterface;

class RecipeRepository
{
	protected $db;

	public function __construct(RecipeReaderInterface $db)
	{
		$this->db = $db;
	}

	public function getRecipeById($id)
	{
		return $this->db->getRecipeById($id);
	}

	public function getRecipesByCuisine($cuisine)
	{
		return $this->db->getRecipesByCuisine($cuisine);
	}

}