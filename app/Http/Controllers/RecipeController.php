<?php

namespace App\Http\Controllers;

class RecipeController extends Controller
{

    public function __construct()
    {
        
    }

// I've chosen to follow Laravel convention here for method names
    public function show ($id)
    {
        // Get one recipe by Id
        // return JSON

        return json_encode( ['recipe_id' => $id] );
    }

    public function index () 
    {
        // get paginated list of recipes by cuisine
        // return JSON

        return json_encode( [] );
    }

    public function store ()
    {
        // Create new recipe
        // Return id of new creation
    }

    public function update ($id)
    {
        // Update existing recipe
        // Return success / failure
    }

// This method could be moved to its own controller, depending on the level of functionality required in future for ratings.
    public function rate ($id)
    {
        // Add rating
        // Return success / failure
    }
}
