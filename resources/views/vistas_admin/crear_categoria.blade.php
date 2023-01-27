@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/userDatos.css') }}">
@endsection
@section('content')
<div class="mt-4 d-flex flex-column text-center align-items-center">
    <h1>@lang("messages.Create category")</h1>
    <form method="POST" action="{{ route('Admin_crear_categoria') }}"
        class="d-flex flex-column align-items-center mt-2 col-lg-5 col-md-7 col-10">
        @csrf
        <div class="row col-7">
            <div class="form-floating mt-2">
                <input type="text" class="@error('nombre') is-invalid @enderror" name="nombre"
                    placeholder="@lang('messages.Name')" value="{{ old('nombre') }}" autofocus>
                @error('nombre')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn mt-2" style="background:#cdb46c;">
            @lang('messages.Create')
        </button>
    </form>
</div>
@endsection