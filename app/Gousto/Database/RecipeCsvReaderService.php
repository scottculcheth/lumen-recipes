<?php

namespace App\Gousto\Database;

use League\Csv\Reader;
use League\Csv\Statement;

/*
 This is where I am putting all of the interaction code for the CSV.
 If this were a database instead, this would be replaced with a data access layer 
 (maybe a set of eloquent models, maybe query builder)
 */

class RecipeCsvReaderService
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
		return $stmt->process($this->csv)->fetchOne(0);
	}

	public function getRecipesByCuisine( $cuisine )
	{
		if( !$cuisine ) return $this->getAllRecipes();

		$stmt = (new Statement())->where( 
			function (array $record) use ($cuisine)
			{
				return $record['recipe_cuisine'] == $cuisine;
			}
		 );
		return $stmt->process($this->csv);
	}

}