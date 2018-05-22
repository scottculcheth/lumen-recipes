<?php


use App\Gousto\Database\RecipeCsvSelectService;
use PHPUnit\Framework\TestCase;

class RecipeCsvUpdateServiceTest extends TestCase
{
    protected $writer;
    protected $reader;

    public function setUp()
    {
        $this->reader = new RecipeCsvSelectService();
        $this->writer = app()->make('App\Gousto\Database\RecipeCsvUpdateService');
    }

    public function testItUpdatesCSV()
    {
        $auto_keys = [
            'created_at',
            'updated_at',
        ];

        $update_recipe = \App\Gousto\RecipeFaker::createFakeRecipe();
        $update_recipe['id'] = 1;

        $this->writer->updateRecipe($update_recipe);

        $csv_recipe = $this->reader->getRecipeById( 1 );

        foreach(array_keys($csv_recipe) as $key){
            if(!in_array($key, $auto_keys)) { // exclude auto-set keys
                $this->assertEquals($update_recipe[$key], $csv_recipe[$key]);
            }
        }
    }
}
