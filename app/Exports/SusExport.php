<?php

namespace App\Exports;

use App\Models\SusEvaluation;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SusExport implements FromCollection, WithCustomCsvSettings, WithHeadings
{
    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';'
        ];
    }

    public function headings(): array
    {
        return ['user_id','sus1','sus2','sus3','sus4','sus5','sus6','sus7','sus8','sus9','sus10'];

    }
        /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SusEvaluation::select('user_id','sus1','sus2','sus3','sus4','sus5','sus6','sus7','sus8','sus9','sus10')->get();
    }
}
