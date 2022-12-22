<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'nombre',
        'apellido',
        'email',
        'contraseña',
        'id_rol',
        'id_direccion',
        'id_vuelo'
    ];

    public function role(){
        return $this->belongsTo('App\Models\Role');
    }

    public function direccione(){
        return $this->belongsTo('App\Models\Direccione');
    }

    public function vuelo(){
        return $this->belongsTo('App\Models\Vuelo');
    }

    public function comentarios(){
        return $this->hasMany('App\Models\Comentario');
    }

    public function pedido(){
        return $this->hasOne('App\Models\Pedido');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
