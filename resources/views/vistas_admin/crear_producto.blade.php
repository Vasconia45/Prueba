@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/userDatos.css') }}">
@endsection
@section('content')
<div class="p-2 mt-4 d-flex flex-column text-center align-items-center">
    <h1>@lang('messages.Create product')</h1>
    <form method="POST" action="{{ route('Admin_crear_producto') }}"
        class="d-flex flex-column align-items-center mt-2 col-lg-5 col-md-7 col-10">
        @csrf
        <div class="row col-8">
            <div class="form-floating mt-2">
                <input id="name" class="@error('nombre') is-invalid @enderror" type="text" name="nombre"
                    placeholder="@lang('messages.Name')" value="{{ old('nombre') }}" autofocus>
                @error('nombre')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row col-8">
            <div class="form-floating mt-2">
                <input id="fecha_cad" class="@error('fecha_cad') is-invalid @enderror" type="date" name="fecha_cad"
                    placeholder="@lang('messages.Expiration date')" value="{{ old('fecha_cad') }}">
                @error('fecha_cad')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row col-8">
            <div class="form-floating mt-2">
                <input id="precio" class="@error('precio') is-invalid @enderror" type="number" name="precio"
                    placeholder="@lang('messages.Prize')" value="{{ old('precio') }}">
                @error('precio')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row col-8">
            <div class="form-floating mt-2">
                <input id="descripcion" class="@error('description') is-invalid @enderror" type="text"
                    name="descripcion" placeholder="@lang('messages.Description')" value="{{ old('description') }}">
                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row col-8">
            <div class="form-floating mt-2">
                <input id="stock" class="@error('stock') is-invalid @enderror" type="number" name="stock"
                    placeholder="@lang('messages.Stock')" value="{{ old('stock') }}">
                @error('stock')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row col-8">
            <div class="form-floating mt-2">
                <input id="calorias" class="@error('calorias') is-invalid @enderror" type="number" name="calorias"
                    placeholder="@lang('messages.Calories')" value="{{ old('calorias') }}">
                @error('calorias')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row col-8">
            <div class="form-floating mt-2">
                <input id="peso" class="@error('peso') is-invalid @enderror" type="number" name="peso"
                    placeholder="@lang('messages.Weight')" value="{{ old('peso') }}">
                @error('peso')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row col-8">
            <div class="form-floating mt-2">
                <input id="hidratos" class="@error('hidratos') is-invalid @enderror" type="number" name="hidratos"
                    placeholder="@lang('messages.Hydrates')" value="{{ old('hidratos') }}">
                @error('hidratos')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row col-8">
            <div class="form-floating mt-2">
                <input id="azucares" class="@error('azucares') is-invalid @enderror" type="number" name="azucares"
                    placeholder="@lang('messages.Sugars')" value="{{ old('azucares') }}">
                @error('azucares')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row col-8">
            <div class="form-floating mt-2">
                <input id="proteinas" class="@error('proteinas') is-invalid @enderror" type="number" name="proteinas"
                    placeholder="@lang('messages.Proteins')" value="{{ old('proteinas') }}">
                @error('proteinas')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row col-8">
            <div class="form-floating mt-2">
                <input id="sal" class="@error('sal') is-invalid @enderror" type="number" name="sal"
                    placeholder="@lang('messages.Salt')" value="{{ old('sal') }}">
                @error('sal')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row col-8">
            <div class="form-floating mt-2">
                <input id="ingredientes" class="@error('ingredientes') is-invalid @enderror" type="text" name="ingredientes"
                    placeholder="@lang('messages.Ingredients')" value="{{ old('ingredientes') }}">
                @error('ingredientes')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row col-8">
            <div class="form-floating mt-2">
                <input id="origen" class="@error('origen') is-invalid @enderror" type="text" name="origen"
                    placeholder="@lang('messages.Source')" value="{{ old('origen') }}">
                @error('origen')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row col-4 mt-2">
            <div class="text-start">
                <label for="role" class="col-form-label text-md-end">@lang('messages.Categories') :</label>
            </div>
            <div>
                <select class="form-select" name="categoria" id="categoria">
                    @foreach ($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row col-4 mt-2">
            <div class="text-start">
                <label for="role" class="col-form-label text-md-end">@lang('messages.Brand') :</label>
            </div>
            <div>
                <select class="form-select" name="marca" id="marca">
                    @foreach ($marcas as $marca)
                    <option value="{{$marca->id}}">{{$marca->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="btn mt-2" style="background:#cdb46c;">
            @lang('messages.Create')
        </button>
    </form>
</div>
@endsection