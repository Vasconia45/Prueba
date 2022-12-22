<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'texto',
        'puntuacion',
        'id:usuario',
        'id_producto'
    ];

    public function usuario(){
        return $this->belongsTo('App\Models\Comentario');
    }

    public function producto(){
        return $this->belongsTo('App\Models\Producto');
    }
}
