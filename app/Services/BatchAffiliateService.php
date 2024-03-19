<?php

namespace App\Services;
use Illuminate\Support\Facades\DB;
use Exception;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportBatchAffiliate;

class BatchAffiliateService
{
    public function __construct()
    {

    }

    public function execute($file){
        $import = new ImportBatchAffiliate;
        $collect = Excel::import($import, $file);
        return $import->data;
    }
}
