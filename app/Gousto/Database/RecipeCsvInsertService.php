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
        $this->writer->insertOne($recipe);
    }
}