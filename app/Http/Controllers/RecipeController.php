<?php

namespace App\Http\Controllers;

use App\Gousto\Repository\RecipeRepository;
use Illuminate\Http\Request;

class RecipeController extends Controller
{

    protected $rr;

    public function __construct(RecipeRepository $rr)
    {
        $this->rr = $rr;
    }

    public function show($id)
    {
        $data = $this->rr->getRecipeById($id);
        foreach( $data as $offset => $recipe )
        {
            dd($recipe);
        }

        return json_encode( ['recipe_id' => $id] );
    }

    public function index(Request $request) 
    {
        // get paginated list of recipes by cuisine
        // return JSON

        $cuisine = $request->input('cuisine');

        $data = $this->rr->getRecipesByCuisine($cuisine);

        foreach( $data as $offset => $recipe )
        {
            var_dump($recipe);
        }
        dd("done");

        return json_encode( $this->rr->getAllRecipes() );
    }

    public function store()
    {
        // Create new recipe
        // Return id of new creation
    }

    public function update($id)
    {
        // Update existing recipe
        // Return success / failure
    }

// This method could be moved to its own controller, depending on the level of functionality required in future for ratings.
    public function rate($id)
    {
        // Add rating
        // Return success / failure
    }
}
