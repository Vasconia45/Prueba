@extends('layouts.app')

@section('content')
    <div class="p-5">
        <h1 class="text-align-center">@lang("messages.Shopping list")</h1>
        <div class="row">
            @foreach ($pedido->productos as $producto)
                <div>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">@lang("messages.Product")</th>
                                <th scope="col">@lang("messages.Price for unit")</th>
                                <th scope="col">@lang("messages.Amount")</th>
                                <th scope="col">@lang("messages.Total price of the units")</th>
                                <td>@lang("messages.Delete")</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $producto->nombre }}</td>
                                <td>{{ ($producto->precio) }}</td>
                                <td>{{ $producto->pivot->cantidad }}</td>
                                <td>{{ ($producto->precio)*($producto->pivot->cantidad) }}</td>
                                <form action="{{route('lista_compra_borrar',[$producto->id])}}" method="POST">
                                    @csrf
                                    <td class="inner-table"><button type="submit" class="btn btn-danger"><i class="fa-sharp fa-solid fa-trash"></button></td>
                                </form>
                            </tr>
            @endforeach
                          </tbody>
                    </table>
                    <br><br>
                    <h2>@lang("messages.Total price of all products"):{{ $precio_total }}</h2>
        </div>
    </div>
    </div>
@endsection
