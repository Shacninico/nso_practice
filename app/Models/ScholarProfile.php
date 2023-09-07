<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScholarProfile extends Model
{
    use HasFactory;
    protected $table = 'scholar_profile';
    protected $fillable = [
        'id',
        'spas_id',
        'year_of_award',
        'program',
        'lastname',
        'firstname',
        'middlename',
        'suffix',
        'sex',
        'birthday',
        'email',
        'contact_number',
        'school',
        'course',
        'year',
        'lbp',
        'house_num',
        'street',
        'village',
        'barangay',
        'municipality',
        'province',
        'zipcode',
        'district',
        'region',
        'hsname',
        'status',
    ];
}
