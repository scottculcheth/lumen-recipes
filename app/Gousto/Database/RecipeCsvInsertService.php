<?php

namespace App\Gousto\Database;


use App\Gousto\Database\Contract\RecipeInsertInterface;
use League\Csv\Writer;

class RecipeCsvInsertService implements RecipeInsertInterface
{
    protected $writer;

    public function __construct( )
    {
        $this->openConnection();
    }

    protected function openConnection()
    {
        $this->writer = Writer::createFromPath( env('CSV_DIR').env('CSV_FILE_RECIPE'), 'a+' );
    }

    public function insertRecipe($recipe)
    {
        // All of these keys MUST be set in the original recipe object, otherwise it will not be inserted into
        // CSV in the correct order.

        $now = date( "Y-m-d H:i:s" );
        $recipe['id'] = $this->getNextRecipeId(); // autoincrement
        $recipe['created_at'] = $now;
        $recipe['updated_at'] = $now;

        $this->writer->insertOne($recipe);
        return $recipe['id'];
    }

    protected function getNextRecipeId()
    {
        $reader = new RecipeCsvSelectService();
        return $reader->getNextRecipeId();
    }

    protected function prepareCSVRecipe()
    {

    }

}