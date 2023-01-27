@extends('layouts.app')
@section('styles')
<script src="{{ asset('js/password.js')}}"></script>
<link rel="stylesheet" href="{{ asset('css/userDatos.css') }}">
@endsection
@section('content')
<div class="mt-4 d-flex flex-column text-center align-items-center">
    <h1>@lang('messages.Create user')</h1>
    <form method="POST" action="{{ route('Admin_crear_usuario') }}"
        class="d-flex flex-column align-items-center mt-2 col-lg-5 col-md-7 col-10">
        @csrf
        <div class="row col-8">
            <div class="form-floating mt-2">
                <input id="nombre" class="@error('nombre') is-invalid @enderror" type="text" name="nombre"
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
                <input id="apellido" class="@error('apellido') is-invalid @enderror" type="text" name="apellido"
                    placeholder="@lang('messages.Last name')" value="{{ old('apellido') }}">
                @error('apellido')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row col-8">
            <div class="form-floating mt-2">
                <input id="email" class="@error('email') is-invalid @enderror" type="email" name="email"
                    placeholder="@lang('messages.Email')" value="{{ old('email') }}">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row col-8">
            <div class="form-floating mt-2">
                <input id="registerPass" class="@error('password') is-invalid @enderror" type="password" name="password"
                    placeholder="@lang('messages.Password')">
                <div id="pass1Div"></div>
                <div>
                    <div id="progress-bar"></div>
                </div>
                <span id="passstrength"></span>
                <span class="bi bi-eye-fill ojoPassword"></span>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row col-8">
            <div class="form-floating mt-2">
                <input id="registerPass2" class="@error('password2') is-invalid @enderror" type="password"
                    name="password2" placeholder="@lang('messages.RepeatPassword')">
                <span class="bi bi-eye-fill ojoPassword"></span>
                @error('password2')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div id="pass2Div"></div>
        <div class="row col-4 mt-2">
            <div class="text-start">
                <label for="role" class="col-form-label text-md-end">@lang('messages.Role') :</label>
            </div>
            <div>
                <select class="form-select" name="rol" id="rol">
                    @if(Auth()->user()->id == 1)
                    @foreach ($roles as $rol)
                    <option value="{{$rol->id}}">{{$rol->tipo}}</option>
                    @endforeach
                    @else
                    <option value="{{ $rol->id }}">{{ $rol->tipo }}</option>
                    @endif
                </select>
            </div>
        </div>
        <button type="submit" class="btn mt-2" style="background:#cdb46c;">
            @lang('messages.Create')
        </button>
    </form>
</div>
@endsection