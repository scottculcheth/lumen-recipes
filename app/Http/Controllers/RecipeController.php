<?php

namespace App\Http\Controllers;

use App\Gousto\Logic\RecipeRepository;
use Illuminate\Http\Request;

class RecipeController extends Controller
{

    protected $recipeRepository;

    public function __construct(RecipeRepository $rr)
    {
        $this->recipeRepository = $rr;
    }

    public function show($id)
    {
        $recipe = $this->recipeRepository->getRecipeById($id);
        return response()->json( $recipe );
    }

    public function index(Request $request) 
    {
        $cuisine = $request->input('cuisine');
        $page = $request->input('page', 0);
        $recipes = $this->recipeRepository->getRecipesByCuisine($cuisine, $page);
        return response()->json( $recipes );
    }

    public function store(Request $request)
    {
        // Create new recipe
        // Return id of new creation
    }

    public function update($id, Request $request)
    {
        // Update existing recipe
        // Return success / failure
    }

// This method could be moved to its own controller, depending on the level of functionality required in future for ratings.
    public function rate($id, $rating)
    {
        // Add rating
        // Return success / failure
    }
}
