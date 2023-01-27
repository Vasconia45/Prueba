@extends('layouts.app')

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <h1 class="p-2">@lang('messages.This is the list of users')</h1>
            <table class="table">
                <thead>
                    <td>@lang('messages.Name')</td>
                    <td>@lang('messages.Last name')</td>
                    <td>@lang('messages.Email')</td>
                    <td>Recuperar</td>
                    <td>Borrar del todo</td>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <td class="inner-table">{{ $usuario->nombre }}</td>
                            <td class="inner-table">{{ $usuario->apellido }}</td>
                            <td class="inner-table">{{ $usuario->email }}</td>
                            <form action="{{route('admin_lista_usuarios_recuperar',[$usuario->id])}}" method="post">
                                @csrf
                                <td><button type="submit" class="btn btn-primary">Recuperar</button></td>
                            </form>
                            <form action="{{route('admin_lista_usuarios_borrar_del_todo',[$usuario->id])}}" method="post">
                                @csrf
                                <td><button type="submit" class="btn btn-danger">Borrar</button></td>
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection