<?php

namespace App\Gousto\Database;


use App\Gousto\Database\Contract\RecipeSelectInterface;
use App\Gousto\Database\Contract\RecipeUpdateInterface;
use League\Csv\Writer;

class RecipeCsvUpdateService implements RecipeUpdateInterface
{
    protected $select_service;
    protected $writer;

    public function __construct( RecipeSelectInterface $select_service )
    {
        $this->select_service = $select_service;
    }

    protected function openConnection()
    {
        $this->writer = Writer::createFromPath( env('CSV_DIR').env('CSV_FILE_RECIPE'), 'w' );
    }

    // This one needs a bit of explaining...
    // It gets all the existing data into memory, then wipes the file and rewrites it
    // The updated recipe is replaced as part of the foreach loop
    public function updateRecipe($new_recipe)
    {
        $header = $this->select_service->getHeaders();

        $recipe_records = $this->select_service->getAllRecipes();
        $recipes = [];
        foreach ($recipe_records as $recipe) {
            $recipes[] = $recipe['id'] == $new_recipe['id'] ? $new_recipe : $recipe;
        }

        $this->openConnection();

        $this->writer->insertOne($header);

        foreach ($recipes as $recipe) {
            $this->writer->insertOne($recipe);
        }
    }

}