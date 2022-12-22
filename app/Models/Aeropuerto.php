<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aeropuerto extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nombre'
    ];

    public function vuelos(){
        return $this->belongsToMany('App\Models\Vuelo');
    }
}
