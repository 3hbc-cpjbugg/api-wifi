<?php

namespace App\Imports;

use App\Models\Section;
use App\Models\SectionCoordinate;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\DB;
use Exception;
class ImportBatchCoordinates implements ToCollection
{
    public $data;
    public $section;

    public function __construct(int $section)
    {
        $this->section = $section;
    }

    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        unset($rows[0]);
        $this->data = $rows;

        foreach ($this->data as $row) {

            $sectionCoordinate = SectionCoordinate::create([
                'lng' => $row[0],
                'lat' => $row[1],
                'section' => $this->section
            ]);
        }
    }
}
