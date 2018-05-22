<?php


use App\Gousto\Database\RecipeCsvSelectService;
use PHPUnit\Framework\TestCase;

class RecipeCsvSelectServiceTest extends TestCase
{

    protected $recipe_keys = [
        'id',
        'created_at',
        'updated_at',
        'box_type',
        'title',
        'slug',
        'short_title',
        'marketing_description',
        'calories_kcal',
        'protein_grams',
        'fat_grams',
        'carbs_grams',
        'bulletpoint1',
        'bulletpoint2',
        'bulletpoint3',
        'recipe_diet_type_id',
        'season',
        'base',
        'protein_source',
        'preparation_time_minutes',
        'shelf_life_days',
        'equipment_needed',
        'origin_country',
        'recipe_cuisine',
        'in_your_box',
        'gousto_reference',
    ];

    protected $reader;

    public function setUp()
    {
        $this->reader = new RecipeCsvSelectService();
    }

    public function testItReadsOneFromCSV()
    {
        $csv_recipe = $this->reader->getRecipeById( 1 );

        foreach( $this->recipe_keys as $key){
            $this->assertArrayHasKey($key, $csv_recipe);
        }
    }

    public function testItReadsCuisineFromCSV()
    {
        $csv_recipes = $this->reader->getRecipesByCuisine('asian', 0);

        foreach($csv_recipes as $csv_recipe) {
            foreach ($this->recipe_keys as $key) {
                $this->assertArrayHasKey($key, $csv_recipe);
            }
        }
    }
}
