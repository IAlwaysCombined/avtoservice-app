<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    use HasFactory;

    protected $fillable = [
        'vin',
        'model',
        'brand',
        'color',
        'eco',
        'user_id',
    ];

    public $timestamps = false;
}
