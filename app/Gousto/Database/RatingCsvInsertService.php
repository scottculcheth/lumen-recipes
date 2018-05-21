<?php

namespace App\Gousto\Database;

use App\Gousto\Database\Contract\RatingInsertInterface;
use League\Csv\Writer;

class RatingCsvInsertService implements RatingInsertInterface
{
    protected $writer;

    public function __construct( )
    {
        $this->openConnection();
    }

    protected function openConnection()
    {
        $this->writer = Writer::createFromPath( env('CSV_DIR').env('CSV_FILE_RATING'), 'a+' );
    }

    public function insertRating($rating)
    {
        $now = date( "Y-m-d H:i:s" );
        $rating['created_at'] = $now; // These would be set automatically by the SQL on production systems.
        $rating['updated_at'] = $now;

        $this->writer->insertOne($rating);
    }
}