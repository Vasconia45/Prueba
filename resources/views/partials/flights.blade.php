<tr>
<td class="inner-table">{{ $vuelo->aeropuerto_origen }}</td>
<td class="inner-table">{{ $vuelo->aeropuerto_destino }}</td>
<td class="inner-table">{{ $vuelo->cantidad_pasajeros }}</td>
<td class="inner-table">{{ $vuelo->compañia }}</td>
<td class="inner-table">{{ $vuelo->fecha }}</td>
<td class="inner-table">{{ $vuelo->precio }}</td>
<form action="{{route('admin_lista_vuelos_borrar',[$vuelo->id])}}" method="POST">
    @csrf
    @method('DELETE')
    <td class="inner-table"><button type="submit" class="btn btn-danger"><i
                    class="fa-sharp fa-solid fa-trash"></i></button></td>
</form>
</tr>