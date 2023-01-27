<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Vuelo;
use Illuminate\Http\Request;

class ControladorVuelos extends Controller
{
    public function vuelos_mostrar_lista_vuelos(){
        $vuelo=Vuelo::all();
        return view("vistas_usuario.lista_vuelos")->with("vuelos",$vuelo);
    }

    public function registrarse_en_vuelo($id){
        $vuelo=Vuelo::find($id);
        $user=Auth::user();
        if ($vuelo->id==$user->vuelo_id) {

        }else{
            $vuelo->cantidad_pasajeros++;
            $user->vuelo()->associate($vuelo);
            $user->save();
            $vuelo->save();
        }
        return redirect("/mis_vuelos");
    }

    public function cancelarse_en_vuelo($id){
        $vuelo=Vuelo::find($id);
        $user=Auth::user();
        if ($vuelo->id==$user->vuelo_id) {
            $vuelo->cantidad_pasajeros--;
            $vuelo->save();
            $user->vuelo()->dissociate();
            $user->save();
        }
        return redirect("/lista_vuelos");
    }

    public function ver_vuelos(){
        $user=Auth::user();
        return view("vistas_usuario.mis_vuelos")->with("user",$user);
    }
}
