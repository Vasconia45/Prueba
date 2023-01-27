<tr>
    <td class="inner-table">{{ $usuario->nombre }}</td>
    <td class="inner-table">{{ $usuario->apellido }}</td>
    <td class="inner-table">{{ $usuario->email }}</td>
    @if ($usuario->role_id == 1)
    <td class="inner-table">admin</td>
    @else
    <td class="inner-table">user</td>
    @endif
    <form action="{{route('admin_lista_usuarios_ascender',[$usuario->id])}}" method="POST">
        @csrf
        @method('PUT')
        <td class="inner-table"><button type="submit" class="btn btn-success"><i class="bi bi-graph-up-arrow"></i></button>
        </td>
    </form>
    <form action="{{route('admin_lista_usuarios_degradar',[$usuario->id])}}" method="POST">
        @csrf
        @method('PUT')
        <td><button type="submit" class="btn btn-warning"><i class="bi bi-graph-down-arrow"></i></button></td>
    </form>
    <form action="{{route('admin_lista_usuarios_borrar',[$usuario->id])}}" method="POST">
        @csrf
        @method('DELETE')
        <td class="inner-table"><button type="submit" class="btn btn-danger"><i class="fa-sharp fa-solid fa-trash"></button></td>
    </form>
</tr>