<?php

namespace App\Imports;

use App\Models\Section;
use App\Models\Affiliates;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\DB;
use Exception;
class ImportBatchAffiliate implements ToCollection
{
    public $data;
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        unset($rows[0]);
        $this->data = $rows;

        foreach ($this->data as $row) {
            $affiliate = Affiliates::create([
                'first_name' => $row[0],
                'second_name' =>$row[1],
                'first_last_name' => $row[2],
                'second_last_name' => $row[3],
                'lat' => $row[13],
                'lng' => $row[14],
                'rol' => $row[4],
                'elector_key' => $row[10],
                'section' => $row[12],
                'phone' => $row[11],
                'state' => $row[8],
                'municipality' => $row[7],
                'origin' => 'import',
                'birth_date' => $this->getBirthDate($row[8])
            ]);

            $sectionExist = Section::where('section', trim($row[12]))->first();
            if(!$sectionExist ){
                Section::create([
                    'section' => trim($row[11]),
                ]);
            }
        }
    }

    public function getBirthDate($elector_key)
    {
        $array = str_split(trim($elector_key), 6);
        $date = str_split($array[1], 2);
        $year = $date[0];
        $month = $date[1];
        $day = $date[2];

        $result = "";
        if($year > 20){
            $result = '19'.$year.'-'.$month.'-'.$day;
        }else{
            $result = '20'.$year.'-'.$month.'-'.$day;
        }
        return $result;
    }
}
