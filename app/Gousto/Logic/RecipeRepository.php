<?php

namespace App\Gousto\Logic;

use App\Gousto\Database\Contract\RecipeSelectInterface;

class RecipeRepository
{
	protected $db;

	public function __construct(RecipeSelectInterface $db)
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