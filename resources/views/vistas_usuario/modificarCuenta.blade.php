@extends('layouts.app')
@section('content')
<div class="container mt-4">
        <div style=" text-align:center;">
            <table class="table table-striped table-bordered">
                <thead>
                    <th>@lang('messages.Name')</th>
                    <th>@lang('messages.Last name')</th>
                    <th>@lang('messages.Email')</th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                        <tr>
                            <th class="inner-table">{{ $usuario->nombre }}</th>
                            <th class="inner-table">{{ $usuario->apellido }}</th>
                            <th class="inner-table">{{ $usuario->email }}</th>
                            <th>
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <form method="POST" action="{{ route('borrar.cuenta', [$usuario->id]) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-outline-danger"><i class="fa-sharp fa-solid fa-trash"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </th>
                            <th>
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <form method="GET" action="{{ route('showeditar.cuenta', [$usuario->id]) }}">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-outline-success"><i class="fa-sharp fa-solid fa-pencil"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </th>
                        </tr>
                </tbody>
            </table>
        </div>
</div>
@endsection