<?php

namespace App\Gousto\Database;

use League\Csv\Reader;
use League\Csv\Statement;

class RecipeReaderService
{
	
	protected $csv;

	public function __construct( )
	{
		$this->loadCsvData();
	}

	public function loadCsvData()
	{
		$this->csv = Reader::createFromPath( '/opt/gousto/database/csv/recipe-data.csv', 'r' );
		$this->csv->setHeaderOffset(0);
	}

	public function getAllRecipes()
	{
		return $this->csv->getRecords();
	}

	public function getRecipeById( $id )
	{
		$stmt = (new Statement())->where( 
			function (array $record) use ($id)
			{
				return $record['id'] == $id;
			}
		 );
		return $stmt->process($this->csv);
	}

	public function getRecipesByCuisine( $cuisine )
	{
		$stmt = (new Statement())->where( 
			function (array $record) use ($cuisine)
			{
				return $record['recipe_cuisine'] == $cuisine;
			}
		 );
		return $stmt->process($this->csv);
	}

}