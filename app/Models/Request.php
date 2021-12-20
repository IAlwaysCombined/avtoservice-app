<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $fillable = [
        'decs',
        'autos_id',
        'employees_id',
    ];

    public $timestamps = false;

    protected function material(){
        return $this->belongsToMany(Material::class);
    }

    protected function service(){
        return $this->belongsToMany(Service::class);
    }
}
