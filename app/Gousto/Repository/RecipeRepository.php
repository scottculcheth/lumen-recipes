<?php

namespace App\Gousto\Repository;

use App\Gousto\Database\RecipeReaderService;

class RecipeRepository
{
	protected $db;

	public function __construct(RecipeReaderService $db) 
	{
		$this->db = $db;
	}

	public function getRecipeById($id)
	{
		$data = $this->db->getRecipeById($id);
		return $data;
	}

	public function getRecipesByCuisine($cuisine)
	{
		$data = $this->db->getRecipesByCuisine($cuisine);
		return $data;
	}

}