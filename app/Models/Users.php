<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'user_type',
        'firstname',
        'secondname',
        'id_no',
        'phone',
        'password'
    ];
}
