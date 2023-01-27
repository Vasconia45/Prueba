<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccione extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'municipio',
        'calle',
        'puerta',
        'piso'
    ];

    public function usuarios(){
        return $this->hasMany('App\Models\User');
    }
}
