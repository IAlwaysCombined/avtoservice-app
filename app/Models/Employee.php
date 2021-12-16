<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'phone',
        'email_verified_at',
        'name',
        'surname',
        'patronymic',
        'pass',
        'passport_series',
        'passport_number',
        'date',
        'depart',
        'depart_code',
        'date_accept',
        'positions_id',
        'education_id',
        'solutions_id',
    ];

    public $timestamps = false;
}
