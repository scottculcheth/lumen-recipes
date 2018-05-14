<?php

namespace App\Gousto\Database;

use League\Csv\Writer;

class RatingCsvWriterService
{
	
	protected $writer;

	public function __construct( )
	{
		$this->openConnection();
	}

	protected function openConnection()
	{
		$this->writer = Writer::createFromPath( env('CSV_DIR').env('CSV_FILE_RATING'), 'r' );
		$this->writer->setHeaderOffset(0);
	}

	public function insertRating($rating)
    {

    }

}