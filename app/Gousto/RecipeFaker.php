<?php

namespace App\Gousto;

class RecipeFaker
{

    public static function createFakeRecipe()
    {
        $faker = Faker\Factory::create();

        $recipe = [];
        $recipe['id'] = $faker->randomNumber(3);
        $recipe['created_at'] = $faker->date('Y-m-d H:i:s');
        $recipe['updated_at'] = $faker->date('Y-m-d H:i:s');
        $recipe['box_type'] = $faker->randomElement(['vegetarian', 'gourmet']);
        $recipe['title'] = $faker->words(4, true);
        $recipe['slug'] = str_replace(' ', '-', $recipe['title']);
        $recipe['short_title'] = '';
        $recipe['marketing_description'] = $faker->test(200);
        $recipe['calories_kcal'] = $faker->randomNumber(3);
        $recipe['protein_grams'] = $faker->randomNumber(2);
        $recipe['fat_grams'] = $faker->randomNumber(2);
        $recipe['carbs_grams'] = $faker->randomNumber(2);
        $recipe['bulletpoint1'] = $faker->test(200);
        $recipe['bulletpoint2'] = $faker->test(200);
        $recipe['bulletpoint3'] = $faker->test(200);
        $recipe['recipe_diet_type_id']; $faker->randomElement(['meat', 'fish', 'vegetarian']);
        $recipe['season'] = 'all';
        $recipe['base'] = $faker->randomElement(['noodles', 'pasta', 'beans']);
        $recipe['protein_source'] = $faker->randomElement(['beef', 'seafood', 'pork', 'cheese', 'chicken', 'eggs']);
        $recipe['preparation_time_minutes'] = $faker->randomElement([30, 35, 40, 45, 50]);
        $recipe['shelf_life_days'] = $faker->randomDigitNotNull();
        $recipe['equipment_needed'] = $faker->randomElement(['None', 'Mortar and Pestle', 'Appetite']);
        $recipe['origin_country'] = 'Great Britain';
        $recipe['recipe_cuisine'] = $faker->randomElement(['asian', 'british', 'italian', 'mediterranean', 'mexican']);
        $recipe['in_your_box'] = $faker->test(200);
        $recipe['gousto_reference'] = $faker->randomNumber(3);

        return $recipe;
    }

}