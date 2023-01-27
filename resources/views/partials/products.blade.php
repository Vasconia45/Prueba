<tr>
    <td class="inner-table">{{ $producto->nombre }}</td>
    <td class="inner-table">{{ $producto->fecha_cad }}</td>
    <td class="inner-table">{{ $producto->precio }}</td>
    <td class="inner-table">{{ $producto->descripcion }}</td>
    <td class="inner-table">{{ $producto->stock }}</td>
    <td class="inner-table">{{ $producto->calorias }}</td>
    <td class="inner-table">{{ $producto->peso }}</td>
    <td class="inner-table">{{ $producto->hidratos }}</td>
    <td class="inner-table">{{ $producto->azucares }}</td>
    <td class="inner-table">{{ $producto->proteinas }}</td>
    <td class="inner-table">{{ $producto->sal }}</td>
    <td class="inner-table">{{ $producto->ingredientes }}</td>
    <td class="inner-table">{{ $producto->origen }}</td>
    <form action="{{route('admin_lista_productos_borrar',[$producto->id])}}" method="POST">
        @csrf
        @method('DELETE')
        <td class="inner-table"><button type="submit" class="btn btn-danger"><i
                    class="fa-sharp fa-solid fa-trash"></i></button>
        </td>
    </form>
</tr>