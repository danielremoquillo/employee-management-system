<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_name', 'employee_email', 'employee_bday', 'employee_gender', 'employee_address', 'employee_degree', 'position_id'
    ];
}
