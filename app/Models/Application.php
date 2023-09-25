<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable =[
        'reference_number',
        'student_fullname',
        'adm_upi_reg_no',
        'school_type',
        'school_name',
        'bank_name',
        'account_no',
        'location',
        'status'
    ];
} 
