<?php

namespace App\Gousto\Database;

use App\Gousto\Database\Contract\RecipeSelectInterface;
use League\Csv\Reader;
use League\Csv\Statement;

/*
 This is where I am putting all of the read interaction code for the CSV.
 If this were a database instead, this would be replaced with a data access layer 
 (maybe a set of eloquent models, maybe query builder)

 Made use of the PHPLeague CSV library for ease of data access.
 Details at: csv.thephpleague.com
 */

class RecipeCsvSelectService implements RecipeSelectInterface
{

    protected $reader;
    protected $limit = 5; // This could also be coded to be either configurable, or user defined


    public function __construct( )
    {
        $this->openConnection();
    }

    protected function openConnection()
    {
        $this->reader = Reader::createFromPath( env('CSV_DIR').env('CSV_FILE_RECIPE'), 'r' );
        $this->reader->setHeaderOffset(0);
    }

    public function getHeaders()
    {
        return $this->reader->getHeader();
    }

    public function getAllRecipes()
    {
        $stmt = new Statement();
        return $stmt->process($this->reader);
    }

    public function getAllRecipesPaged($page)
    {
        $stmt = (new Statement())
            ->offset($this->limit * $page)
            ->limit($this->limit);
        return $stmt->process($this->reader);
    }

    // Statement is the query language used by the CSV file reader.
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

    public function getRecipesByCuisine( $cuisine, $page )
    {
        if( !$cuisine ) return $this->getAllRecipesPaged($page);

        $stmt = (new Statement())->where(
                function (array $record) use ($cuisine)
                {
                    return $record['recipe_cuisine'] == $cuisine;
                }
            )
            ->offset($this->limit * $page)
            ->limit($this->limit)
        ;
        return $stmt->process($this->reader);
    }

    public function getNextRecipeId()
    {
        return count($this->reader) + 1; // Auto-Increment Replacement
        // Assumes starts a 1, no missing values and no deletions possible
    }

}