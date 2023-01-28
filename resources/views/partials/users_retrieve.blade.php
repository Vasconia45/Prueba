<tr>
    <td class="inner-table">{{ $usuario->id }}</td>
    <td class="inner-table">{{ $usuario->nombre }}</td>
    <td class="inner-table">{{ $usuario->apellido }}</td>
    <td class="inner-table">{{ $usuario->email }}</td>
    @if ($usuario->role->id == 1)
    <td class="inner-table">admin</td>
    @else
    <td class="inner-table">user</td>
    @endif
    <form action="{{route('admin_lista_usuarios_recuperar',[$usuario->id])}}" method="post">
        @csrf
        <td><button type="submit" class="btn btn-primary"><i class="bi bi-plus-lg"></i></button></td>
    </form>
    <form action="{{route('admin_lista_usuarios_borrar_del_todo',[$usuario->id])}}" method="post">
        @csrf
        <td><button type="submit" class="btn btn-danger"><i
                    class="fa-sharp fa-solid fa-trash"></i></button></td>
    </form>
</tr>