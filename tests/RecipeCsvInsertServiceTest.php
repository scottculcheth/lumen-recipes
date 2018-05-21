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
        $auto_keys = [
            'id',
            'created_at',
            'updated_at',
        ];

        $new_recipe = \App\Gousto\RecipeFaker::createFakeRecipe();

        $id = $this->writer->insertRecipe($new_recipe);

        $csv_recipe = $this->reader->getRecipeById( $id );

        foreach(array_keys($csv_recipe) as $key){
            if(!in_array($key, $auto_keys)) { // exclude auto-set keys
                $this->assertEquals($new_recipe[$key], $csv_recipe[$key]);
            }
        }
    }


}
