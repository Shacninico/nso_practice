<?php

namespace App\Exports;

use App\Models\ScholarProfile;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ScholarExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ScholarProfile::select("spas_id", "year_of_award", "award_type", "program", "lastname", "firstname", "middlename", "suffix", "sex", "birthday", "email", "contact_number", "school", "course", "year", "lbp", "house_num", "street", "village", "barangay", "municipality", "province", "zipcode", "district", "region", "hsname", "status")->get();
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ['spas_id', 'year_of_award', 'award_type', 'program', 'lastname', 'firstname', 'middlename', 'suffix', 'sex', 'birthday', 'email', 'contact_number', 'school', 'course', 'year', 'lbp', 'house_num', 'street', 'village', 'barangay', 'municipality', 'province', 'zipcode', 'district', 'region', 'hsname', 'status'];
    }
}
