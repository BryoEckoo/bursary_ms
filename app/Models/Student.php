<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable =[
        'firstname',
        'secondname',
        'student_fullname',
        'age',
        'gender',
        'family_status',
        'parent_guardian_name',
        'phone',
        'occupation',
        'adm_upi_reg_no',
        'school_type',
        'school_name',
        'county',
        'ward',
        'location',
    ];
}
