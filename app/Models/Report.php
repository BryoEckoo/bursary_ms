<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable =[
        'report_id',
        'report_name',
        'student_name',
        'parent',
        'school_level',
        'school_name',
        'location',
        'Amount_awarded',
        'total_amount_awarded',
    ];
}
