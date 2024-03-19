<?php

namespace App\Services;
use Illuminate\Support\Facades\DB;
use Exception;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportBatchCoordinates;

class BatchCoordinatesService
{
    public function __construct()
    {

    }

    public function execute($file,$section){
        $import = new ImportBatchCoordinates($section);

        $collect = Excel::import($import, $file);
        return $import->data;
    }
}
