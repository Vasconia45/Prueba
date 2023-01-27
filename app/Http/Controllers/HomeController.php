<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\User;
use App\Models\Producto;
use App\Models\Vuelo;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $usuarios = count(User::where('role_id', 2)->get());
        $productos = count(Producto::all());
        $brands = count(Marca::all());
        $flights = count(Vuelo::all());
        if(Gate::allows("admin",auth()->user())){
            return view("layouts.app-admin")->with(['usuarios' => $usuarios, 'productos' => $productos, 'brands' => $brands,  'flights' => $flights]);
        }
        return redirect('/');$usuarios = count(User::where('role_id', 2)->get());
        $productos = count(Producto::all());
        $brands = count(Marca::all());
        $flights = count(Vuelo::all());
        if(Gate::allows("admin",auth()->user())){
            return view("layouts.app-admin")->with(['usuarios' => $usuarios, 'productos' => $productos, 'brands' => $brands,  'flights' => $flights]);
        }
        return redirect('/');
    }
}
