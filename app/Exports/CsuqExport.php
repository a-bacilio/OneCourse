<?php

namespace App\Exports;

use App\Models\CsuqEvaluation;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CsuqExport implements FromCollection, WithCustomCsvSettings, WithHeadings
{
    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';'
        ];
    }

    public function headings(): array
    {
        return ['user_id','csuq1','csuq2','csuq3','csuq4','csuq5','csuq6','csuq7','csuq8','csuq9','csuq10','csuq11','csuq12','csuq13','csuq14','csuq15','csuq16'];

    }
        /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CsuqEvaluation::select('user_id','csuq1','csuq2','csuq3','csuq4','csuq5','csuq6','csuq7','csuq8','csuq9','csuq10','csuq11','csuq12','csuq13','csuq14','csuq15','csuq16')->get();
    }
}



