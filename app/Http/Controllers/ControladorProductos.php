<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Producto;
use App\Models\Pedido;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Comentario;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ControladorProductos extends Controller
{
    public function mostrar_lista_de_productos(){
        $productos=Producto::all();
        $categorias = Categoria::all();
        $marcas = Marca::all();
        return view("vistas_producto.lista_productos", ["productos" => $productos, "categorias" => $categorias, "marcas" => $marcas]);
    }

    public function mostrar_pedido(){
        $usuario=Auth::user();
        $pedido=Pedido::where('usuario_id', $usuario->id)->first();
        $precio_total = 0;
        foreach ($pedido->productos as $producto) {
            $precio_total=$precio_total+(($producto->precio)*($producto->pivot->cantidad));
        }
        return view("vistas_producto.lista_compra",["pedido" => $pedido,"precio_total" => $precio_total]);
    }

    public function comprar($id){
        $usuario=Auth::user();
        $producto=Producto::find($id);
        $pedido=Pedido::where('usuario_id', $usuario->id)->first();
        $precio_total = 0;
        if($pedido->productos()->where('producto_id', $producto->id)->exists() == false){
            $cantidad = 1;
            $precio_total = $producto->precio;
            $pedido->productos()->attach($producto,["cantidad" => $cantidad]);
        }
        else{
            foreach ($pedido->productos as $producto_recorridos) {
                if($producto->id==$producto_recorridos->id){
                    $cantidad = $producto_recorridos->pivot->cantidad;
                    $cantidad++;
                    $pedido->productos()->updateExistingPivot($producto, ['cantidad' => $cantidad]);
                }
                $precio_total=$precio_total+(($producto_recorridos->precio)*($producto_recorridos->pivot->cantidad));
            }
        }
        return view("vistas_producto.lista_compra",["pedido" => $pedido,"precio_total" => $precio_total]);
    }

    public function quitar_producto($id){
        $usuario=Auth::user();
        $producto=Producto::find($id);
        $pedido=Pedido::where('usuario_id', $usuario->id)->first();
        $pedido->productos()->detach($producto);
        return redirect("/pedido");
    }


    public function buscarProducto(Request $request){
        $texto = $request->get("texto");
        $categorias = Categoria::all();
        $marcas = Marca::all();
        $categoria = $request->get("categoria");
        $marca = $request->get("marca");
        if(isset($categoria) && isset($marca)){
            $productos = Producto::where('nombre', 'LIKE', '%' . $texto . '%')->where('categoria_id', 'LIKE', $categoria )->where('marca_id', 'LIKE', $marca )->get();
            return view("vistas_producto.lista_productos", ["productos" => $productos, "categorias" => $categorias, "marcas" => $marcas]);
        } else if(isset($marca) && !isset($categoria)){
            $productos = Producto::where('nombre', 'LIKE', '%' . $texto . '%')->where('marca_id', 'LIKE', $marca )->get();
            return view("vistas_producto.lista_productos", ["productos" => $productos, "categorias" => $categorias, "marcas" => $marcas]);
        } else if(!isset($marca) && isset($categoria)){
            $productos = Producto::where('nombre', 'LIKE', '%' . $texto . '%')->where('categoria_id', 'LIKE', $categoria )->get();
            return view("vistas_producto.lista_productos", ["productos" => $productos, "categorias" => $categorias, "marcas" => $marcas]);
        }
        $productos = Producto::where('nombre', 'LIKE', '%' . $texto . '%')->get();
        return view("vistas_producto.lista_productos", ["productos" => $productos, "categorias" => $categorias, "marcas" => $marcas]);
    }

    public function comentar($id,Request $request){
        $usuario=Auth::user();
        $producto=Producto::find($id);
        $comentario=new Comentario();
        $comentario->texto=$request->get("comentario");
        $comentario->puntuacion=$request->get("puntuacion");
        $comentario->producto()->associate($producto);
        $comentario->usuario()->associate($usuario)->save();
        return redirect("/lista_productos");
    }

}
