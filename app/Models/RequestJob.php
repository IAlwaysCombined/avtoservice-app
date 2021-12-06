<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestJob extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'phone',
        'email_verified_at',
        'name',
        'surname',
        'pass',
        'passport_series',
        'passport_number',
        'date',
        'depart',
        'depart_code',
        'positions_id',
        'education_id',
    ];

    public $timestamps = false;

}
