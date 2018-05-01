<?php

// NB: In production, this is likely to be within an /api group with /version groups underneath
// This would allow for middleware for authentication
// Versioning prevents errors during deprecation of API functionality

$router->group( ['prefix' => 'recipes'], function () use ($router) {

	$router->get('', function () { return "Get Many Recipes"; } );
	$router->get('{id}', function ($id) { return "Get One Recipe $id"; } );
	$router->post('', function () { return "Add New Recipe"; } );
	$router->put('{id}', function ($id) { return "Update Recipe $id"; } );

	$router->post('{id}/rate', function ($id) { return "Add Recipe Rating"; } );

});