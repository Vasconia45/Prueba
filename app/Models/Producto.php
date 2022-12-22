<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nombre',
        'fecha_cad',
        'precio',
        'descripcion',
        'stock',
        'calorias',
        'peso',
        'hidratos',
        'azucares',
        'proteinas',
        'sal',
        'ingredientes',
        'origen',
        'id_categoria',
        'id_marca'
    ];

    public function marca(){
        return $this->belongsTo('App\Models\Marca');
    }

    public function categoria(){
        return $this->belongsTo('App\Models\Categoria');
    }

    public function comentarios(){
        return $this->hasMany('App\Models\Comentario');
    }

    public function pedidos(){
        return $this->belongsToMany('App\Models\Pedido');
    }
}
