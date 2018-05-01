<?php

// NB: In production, this is likely to be within an /api group with /version groups underneath
// This would allow for middleware for authentication
// Versioning prevents errors during deprecation of API functionality

$router->group( ['prefix' => 'recipes'], function () use ($router) {

	$router->get  ('', 	   [ 'uses' => 'RecipeController@index'  ] );
	$router->get  ('{id}', [ 'uses' => 'RecipeController@show'   ] );
	$router->post ('', 	   [ 'uses' => 'RecipeController@store'  ] );
	$router->put  ('{id}', [ 'uses' => 'RecipeController@update' ] );

	$router->post('{id}/rate', [ 'uses' => 'RecipeController@rate' ] );

});