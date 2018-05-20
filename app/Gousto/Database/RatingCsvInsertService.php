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
        $this->writer->insertOne($rating);
    }
}