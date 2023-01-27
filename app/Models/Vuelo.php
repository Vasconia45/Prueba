<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vuelo extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'aeropuerto_origen',
        'aeropuerto_destino',
        'cantidad_pasajeros',
        'compañia'
    ];

    public function usuarios(){
        return $this->hasMany('App\Models\User');
    }

    public function aeropuertos(){
        return $this->belongsToMany('App\Models\Aeropuerto');
    }
}
