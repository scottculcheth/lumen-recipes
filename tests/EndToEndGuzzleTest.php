<?php


use PHPUnit\Framework\TestCase;
use App\Gousto\Database\RatingCsvSelectService;
use App\Gousto\Database\RecipeCsvSelectService;
use GuzzleHttp\Client as Guzzle;

class EndToEndGuzzleTest extends TestCase
{
    protected $guzzle;

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

    public function setUp()
    {
        $this->guzzle = new Guzzle();
    }

    public function testItCanGetOneRecipe()
    {
        $result = $this->guzzle->get( 'http://gousto.test/recipes/1' )->getBody();
        $recipe = json_decode($result, true)['recipe'];

        foreach( $this->recipe_keys as $key){
            $this->assertArrayHasKey($key, $recipe);
        }
    }

    public function testItCanGetCuisineRecipes()
    {
        $result = $this->guzzle->get( 'http://gousto.test/recipes?cuisine=asian' )->getBody();
        $recipes = json_decode($result, true)['recipe_data'];

        foreach($recipes as $recipe) {
            foreach ($this->recipe_keys as $key) {
                $this->assertArrayHasKey($key, $recipe);
            }
        }
    }

    public function testItCanAddRating()
    {
        $recipe_id = 1;
        $start_rating_reader = new RatingCsvSelectService();
        $starting_full_count = $start_rating_reader->getRatingsCount();
        $starting_recipe_count = $start_rating_reader->getRatingsCountByRecipe($recipe_id);

        $this->guzzle->post('http://gousto.test/recipes/rate/'.$recipe_id.'/5');

        $end_rating_reader = new RatingCsvSelectService();

        $this->assertEquals($starting_full_count+1, $end_rating_reader->getRatingsCount());
        $this->assertEquals($starting_recipe_count+1, $end_rating_reader->getRatingsCount($recipe_id));
    }

    public function testItCanAddRecipe()
    {
        $auto_keys = [
            'id',
            'created_at',
            'updated_at',
        ];

        $new_recipe = \App\Gousto\RecipeFaker::createFakeRecipe();

        $result = $this->guzzle->post('http://gousto.test/recipes', ['json'=>['recipe' => $new_recipe]])->getBody();
        $recipe_id = json_decode($result, true)['recipe_id'];

        $reader = new RecipeCsvSelectService();
        $csv_recipe = $reader->getRecipeById( $recipe_id );

        foreach(array_keys($csv_recipe) as $key){
            if(!in_array($key, $auto_keys)) { // exclude auto-set keys
                $this->assertEquals($new_recipe[$key], $csv_recipe[$key]);
            }
        }
    }


    public function testItCanUpdateRecipe()
    {
        $auto_keys = [
            'id',
            'created_at',
            'updated_at',
        ];

        $update_recipe = \App\Gousto\RecipeFaker::createFakeRecipe();

        $this->guzzle->put('http://gousto.test/recipes/1', ['json'=>['recipe' => $update_recipe]]);

        $reader = new RecipeCsvSelectService();
        $csv_recipe = $reader->getRecipeById( 1 );

        foreach(array_keys($csv_recipe) as $key){
            if(!in_array($key, $auto_keys)) { // exclude auto-set keys
                $this->assertEquals($update_recipe[$key], $csv_recipe[$key]);
            }
        }
    }




}
