<?php
  
namespace App\Imports;
  
use App\Models\ScholarProfile;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;
  
/**
 * Summary of UsersImport
 */
class ScholarImports implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ScholarProfile([
            'spas_id' => $row['spas_id'],
            'year_of_award'=> $row['year_of_award'], 
            'award_type' => $row['award_type'], 
            'program' => $row['program'], 
            'lastname' => $row['lastname'], 
            'firstname' => $row['firstname'], 
            'middlename' => $row['middlename'], 
            'suffix' => $row['suffix'], 
            'sex' => $row['sex'], 
            'birthday' => Date::excelToDateTimeObject($row['birthday']), 
            'email' => $row['email'], 
            'contact_number' => $row['contact_number'], 
            'school' => $row['school'], 
            'course' => $row['course'], 
            'year' => $row['year'], 
            'lbp' => $row['lbp'], 
            'house_num' => $row['house_num'],
            'street' => $row['street'],
            'village' => $row['village'],
            'barangay' => $row['barangay'], 
            'municipality' => $row['municipality'],
            'province' => $row['province'],
            'zipcode' => $row['zipcode'],
            'district' => $row['district'],
            'region' => $row['region'],
            'hsname' => $row['hsname'],
            'status' => $row['status'],
            ]);
    }
}