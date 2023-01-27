@extends('layouts.app')

@section('content')
    <script type="text/javascript">
        function unselect() {
            document.querySelectorAll('[name=categoria]').forEach((x) => x.checked = false);
            document.querySelectorAll('[name=marca]').forEach((x) => x.checked = false);
        }
    </script>
    <div class="p-5">
        <h1 style="text-align: center">@lang('messages.List of product')</h1>
        <div class="row">
            <div class="p-5" style="text-align: center">
                <div>
                    <h4>@lang('messages.Find the products that interest you')</h4>
                </div>
                <div>
                    <form method="get" action="{{ route('buscar.productos') }}">
                        <input type="text" name="texto" class="col-2">
                        <div>
                            @foreach ($categorias as $categoria)
                                <input type="radio" class="m-2" value="{{ $categoria->id }}" name="categoria"
                                    id="{{ $categoria->id }}"><label for="{{ $categoria->id }}">{{ $categoria->nombre }}</label>
                            @endforeach
                        </div>
                        <div>
                            @foreach ($marcas as $marca)
                                <input type="radio" class="m-2" value="{{ $marca->id }}" name="marca"
                                    id="{{ $marca->id . 'm' }}"><label for="{{ $marca->id . 'm' }}">{{ $marca->nombre }}</label>
                            @endforeach
                        </div>
                        <div class="mb-2 mt-2"style="text-align: center;">
                            <button type="submit" class="btn"
                            style="background-color: #CCB26B;">@lang('messages.Search')</button>
                        </div>
                    </form>
                    <div style="text-align: center">
                        <button id="unselect" class="btn"
                        style="background-color: #CCB26B;"onclick="unselect()">@lang('messages.Deselect')</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($productos as $producto)
                <div class="col-3 mt-5">
                    <div class="card" style="width: 100%;">
                        <img class="card-img-top p-2" src="{{ URL('assets/img/' . $producto->nombre . '.jpg') }}"
                            alt="Error en la foto">
                        <div class="card-body">
                            <div>
                                <p>@lang('messages.Name'):{{ $producto->nombre }}</p>
                                <p>@lang('messages.Expiration date'):{{ $producto->fecha_cad }}</p>
                                <p>@lang('messages.Prize'):{{ $producto->precio }}</p>
                                <p>@lang('messages.Description'):{{ $producto->descripcion }}</p>
                                <p>@lang('messages.Categories'):{{ $producto->categoria->nombre }}</p>
                                <p>@lang('messages.Brand'):{{ $producto->marca->nombre }}</p>
                                <form action="{{ route('productos_comprar',[$producto->id])}}" method="post">
                                    <div style="text-align: center">
                                        @csrf
                                        @method("post")
                                        <button type="submit" class="btn"
                                            style="background-color: #CCB26B;">@lang('messages.Buy')</button>
                                    </div>
                                </form>
                            </div>
                            <hr>
                            <div>
                                <h3>@lang('messages.Characteristics')</h3>
                                <div class="d-flex p-2 gap-2">
                                    <div class=col-4>
                                        <p>@lang("messages.Hydrates"):{{ $producto->hidratos }}</p>
                                        <p>@lang("messages.Sugars"):{{ $producto->azucares }}</p>
                                        <p>@lang("messages.Proteins"):{{ $producto->proteinas }}</p>
                                    </div>
                                    <div class="col-4">
                                        <p>@lang("messages.Salt"):{{ $producto->sal }}</p>
                                        <p>@lang("messages.Source"):{{ $producto->origen }}</p>
                                        <p>@lang("messages.Ingredients"):{{ $producto->ingredientes }}</p>
                                    </div>
                                    <div class="col-4">
                                        <p>@lang('messages.Calories'):{{ $producto->calorias }}</p>
                                        <p>@lang("messages.Weight"):{{ $producto->peso }}</p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h3>@lang("messages.Comments")</h3>
                                <table class="table borderless">
                                    <tr>
                                        <td>@lang("messages.User")</td>
                                        <td>@lang("messages.Comment_2")</td>
                                        <td>@lang("messages.Assessment")</td>
                                    </tr>
                                @foreach ($producto->comentarios as $comentario)
                                    <tr>
                                        <td>{{ $comentario->usuario->nombre }}</td>
                                        <td>{{ $comentario->texto }}</td>
                                        <td>{{ $comentario->puntuacion }}</td>
                                    </tr>
                                @endforeach
                                </table>
                                <div class="p-2">
                                    <form action="{{ route('productos_comentar',[$producto->id])}}" method="post">
                                        @csrf
                                        <label>{{ auth()->user()->nombre }}:</label><input type="text" name="comentario" id="comentario">
                                        <select name="puntuacion" id="puntuacion">
                                            @for ($i=1;$i<=10;$i++)
                                                <option>{{ $i }}</option>
                                            @endfor
                                        </select>
                                        <button type="submit" class="btn"
                                            style="background-color: #CCB26B;">@lang('messages.Comment')</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
