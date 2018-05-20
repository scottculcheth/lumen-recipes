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

    public function insertRating( $rating )
    {
        $this->db->insertRating($rating);
    }

}