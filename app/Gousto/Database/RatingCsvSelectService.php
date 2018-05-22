<?php

namespace App\Gousto\Database;


use App\Gousto\Database\Contract\RatingSelectInterface;
use League\Csv\Reader;
use League\Csv\Statement;

class RatingCsvSelectService implements RatingSelectInterface
{
    protected $writer;

    public function __construct( )
    {
        $this->openConnection();
    }

    protected function openConnection()
    {
        $this->reader = Reader::createFromPath( env('CSV_DIR').env('CSV_FILE_RATING'), 'r' );
        $this->reader->setHeaderOffset(0);
    }

    public function getRatingsCount()
    {
        return count($this->reader);
    }

    public function getRatingsCountByRecipe($recipe_id)
    {
        $stmt = (new Statement())->where(
            function (array $record) use ($recipe_id)
            {
                return $record['recipe_id'] == $recipe_id;
            }
        );
        $records = $stmt->process($this->reader);
        return count($records);
    }

}