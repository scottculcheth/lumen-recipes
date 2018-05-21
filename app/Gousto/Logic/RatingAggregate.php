<?php

namespace App\Gousto\Logic;


use App\Gousto\Database\Contract\RatingInsertInterface;

class RatingAggregate
{
    protected $db;

    public function __construct(RatingInsertInterface $db)
    {
        $this->db = $db;
    }

    public function insertRating( $recipe_id, $rating )
    {
        $rating_record = [];
        $rating_record['recipe_id'] = $recipe_id;
        $rating_record['rating'] = $rating;
        $rating_record['user_id'] = 1; // This would be set by authorised user id in production system

        // Validate Recipe exists

        $this->db->insertRating($rating_record);
    }

}