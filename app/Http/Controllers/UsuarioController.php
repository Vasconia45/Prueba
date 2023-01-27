<?php
namespace App\Http\Controllers;
use App\Http\Requests\ValidarDatos;
use App\Models\User;
use App\Models\Vuelo;
use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
class UsuarioController extends Controller
{
    public function destroy($id)
    {
        $usuario= User::find($id);
        $usuario->delete();
        return redirect("/");
    }
    public function update($id,Request $request){
        $this->validar($request);
        $user=User::find($id);
        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        /*$img = $request->file('file')->store('public');
        $url = Storage::url($img);
        $user->imagen = $url;*/
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('modificar.cuenta')->with(['usuario' => Auth::user()]);
    }
    public function validar(Request $request){
        $validation = $request->validate([
            'nombre' => ['required', 'string'],
            'apellido' => ['required', 'string'],
            /*'file' => ['required', 'image'],*/
            'password' => ['required', 'string'],
            'password2' => ['required', 'string', 'same:password'],
        ]);
        return $validation;
    }
    public function mostrarUpdate($id){
        $usuario = User::find($id);
        return view("vistas_usuario.actualizar_datos_usuario")->with(['usuario' => $usuario]);
    }
    public function index(){
        $usuario = Auth::user();
        $prueba = Categoria::all()->random(3);
        return view("vistas_usuario.modificarCuenta")->with(['usuario' => $usuario, 'pruebas' => $prueba]);
    }
    public function mostrar_vuelos(){
        $vuelos = Vuelo::all();
        return view("vistas_usuario.lista_vuelos")->with(['vuelos' => $vuelos]);
    }
}