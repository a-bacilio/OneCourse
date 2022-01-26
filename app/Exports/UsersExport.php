<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithCustomCsvSettings, WithHeadings
{
    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';'
        ];
    }

    public function headings(): array
    {
        return ['name','email','gender','birth_date','education_level','civil_status','occupation','residence_state','residence_province','residence_district','covid_family','caretaker_you','caretaker_pro','lesson_now','lesson_max','usability'];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::select('name','email','gender','birth_date','education_level','civil_status','occupation','residence_state','residence_province','residence_district','covid_family','caretaker_you','caretaker_pro','lesson_now','lesson_max','usability')->get();
    }
}
