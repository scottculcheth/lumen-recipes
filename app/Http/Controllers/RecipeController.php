<?php

namespace App\Http\Controllers;

use App\Gousto\Logic\RatingAggregate;
use App\Gousto\Logic\RecipeAggregate;
use App\Gousto\Logic\RecipeRepository;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function show($id, RecipeRepository $recipeRepository)
    {
        $recipe = $recipeRepository->getRecipeById($id);
        return response()->json(['recipe' => $recipe]);
    }

    public function index(Request $request, RecipeRepository $recipeRepository)
    {
        $cuisine = $request->input('cuisine');
        $page = $request->input('page', 0);
        $recipes = $recipeRepository->getRecipesByCuisine($cuisine, $page);
        return response()->json(['recipe_data' => $recipes]);
    }

    public function store(Request $request, RecipeAggregate $recipeAggregate)
    {
        $recipe = $request->input('recipe');
        $id = $recipeAggregate->insertRecipe($recipe);
        return response()->json(['recipe_id' => $id]);
    }

    public function update($id, Request $request, RecipeAggregate $recipeAggregate)
    {
        $recipe = $request->input('recipe');
        $recipe['id'] = $id; // this could be in the recipe object, but better to be explicit
        $recipeAggregate->updateRecipe($recipe);
        return response()->json(['recipe_id' => $id]);
    }

// This method could be moved to its own controller, depending on the level of functionality required in future for ratings.
    public function rate($id, $rating, RatingAggregate $ratingAggregate)
    {
        $ratingAggregate->insertRating($id, $rating);
        return response()->json(['recipe_id' => $id]);
    }
}
