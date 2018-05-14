<?php

namespace App\Gousto;


class RatingFaker
{

    public static function createFakeRating()
    {
        $faker = Faker\Factory::create();

        $rating = [];
        $rating['id'] = $faker->randomNumber(3);
        $rating['recipe_id'] = $faker->randomNumber(3);
        $rating['user_id'] = $faker->randomNumber(10);
        $rating['rating'] = $faker->randomElement([1,2,3,4,5]);
        $rating['created_at'] = $faker->date('Y-m-d H:i:s');
        $rating['updated_at'] = $faker->date('Y-m-d H:i:s');

        return $rating;
    }
}