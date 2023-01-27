<tr>
    <td class="inner-table">{{ $marca->nombre }}</td>
    <form action="{{route('admin_lista_marcas_borrar',[$marca->id])}}" method="POST">
        @csrf
        @method('DELETE')
        <td class="inner-table"><button type="submit" class="btn btn-danger"><i
                    class="fa-sharp fa-solid fa-trash"></i></button>
        </td>
    </form>
</tr>