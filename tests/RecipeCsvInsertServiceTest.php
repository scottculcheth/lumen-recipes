<?php


use App\Gousto\Database\RecipeCsvInsertService;
use App\Gousto\Database\RecipeCsvSelectService;
use PHPUnit\Framework\TestCase;

class RecipeCsvInsertServiceTest extends TestCase
{
    protected $writer;
    protected $reader;

    public function setUp()
    {
        $this->writer = new RecipeCsvInsertService();
        $this->reader = new RecipeCsvSelectService();
    }

    public function testItAddsToCSV()
    {
        $new_recipe = \App\Gousto\RecipeFaker::createFakeRecipe();

        $this->writer->insertRecipe($new_recipe);

        $csv_recipe = $this->reader->getRecipeById( $new_recipe['id'] );

        foreach(array_keys($csv_recipe) as $key){
            $this->assertEquals( $new_recipe[$key], $csv_recipe[$key] );
        }
    }


}
