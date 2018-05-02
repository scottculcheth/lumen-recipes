<?php

namespace App\Gousto\Model;

class RecipeFull
{
	public $id;
	public $created_at;
	public $updated_at;
	public $box_type;
	public $title;
	public $slug;
	public $short_title;
	public $marketing_description;
	public $calories_kcal;
	public $protein_grams;
	public $fat_grams;
	public $carbs_grams;
	public $bulletpoint1;
	public $bulletpoint2;
	public $bulletpoint3;
	public $recipe_diet_type_id;
	public $season;
	public $base;
	public $protein_source;
	public $preparation_time_minutes;
	public $shelf_life_days;
	public $equipment_needed;
	public $origin_country;
	public $recipe_cuisine;
	public $in_your_box;
	public $gousto_reference;

	private function __construct()
	{

	}

	public static function createFromArray( $data )
	{
		$recipe = new self();
		$recipe->id = $data['id'];	
		$recipe->created_at = $data['created_at'];
		$recipe->updated_at = $data['updated_at'];
		$recipe->box_type = $data['box_type'];
		$recipe->title = $data['title'];
		$recipe->slug = $data['slug'];
		$recipe->short_title = $data['short_title'];
		$recipe->marketing_description = $data['marketing_description'];
		$recipe->calories_kcal = $data['calories_kcal'];
		$recipe->protein_grams = $data['protein_grams'];
		$recipe->fat_grams = $data['fat_grams'];
		$recipe->carbs_grams = $data['carbs_grams'];
		$recipe->bulletpoint1 = $data['bulletpoint1'];
		$recipe->bulletpoint2 = $data['bulletpoint2'];
		$recipe->bulletpoint3 = $data['bulletpoint3'];
		$recipe->recipe_diet_type_id = $data['recipe_diet_type_id'];
		$recipe->season = $data['season'];
		$recipe->base = $data['base'];
		$recipe->protein_source = $data['protein_source'];
		$recipe->preparation_time_minutes = $data['preparation_time_minutes'];
		$recipe->shelf_life_days = $data['shelf_life_days'];
		$recipe->equipment_needed = $data['equipment_needed'];
		$recipe->origin_country = $data['origin_country'];
		$recipe->recipe_cuisine = $data['recipe_cuisine'];
		$recipe->in_your_box = $data['in_your_box'];
		$recipe->gousto_reference = $data['gousto_reference'];

		return $recipe;
	}
}