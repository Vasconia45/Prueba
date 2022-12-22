<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'total',
        'id_usuario'
    ];

    public function usuario(){
        return $this->belongsTo('App\Models\Usuario');
    }

    public function productos(){
        return $this->belongsToMany('App\Models\Producto');
    }
}
