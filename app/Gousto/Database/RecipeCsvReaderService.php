<?php

namespace App\Gousto\Database;

use League\Csv\Reader;
use League\Csv\Statement;

/*
 This is where I am putting all of the read interaction code for the CSV.
 If this were a database instead, this would be replaced with a data access layer 
 (maybe a set of eloquent models, maybe query builder)

 Made use of the PHPLeague CSV library for ease of data access.
 Details at: csv.thephpleague.com
 */

class RecipeCsvReaderService implements RecipeReaderInterface
{
	
	protected $reader;

	public function __construct( )
	{
		$this->openConnection();
	}

	protected function openConnection()
	{
		$this->reader = Reader::createFromPath( env('CSV_DIR').env('CSV_FILE_RECIPE'), 'r' );
		$this->reader->setHeaderOffset(0);
	}

	public function getAllRecipes()
	{
		return $this->reader->getRecords();
	}

	public function getRecipeById($id)
	{
		$stmt = (new Statement())->where( 
			function (array $record) use ($id)
			{
				return $record['id'] == $id;
			}
		 );
		return $stmt->process($this->reader)->fetchOne(0);
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
		return $stmt->process($this->reader);
	}

	public function getAllRecipesExceptOne($id)
    {

    }

}