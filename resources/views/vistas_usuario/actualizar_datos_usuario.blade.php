@extends('layouts.app')
@section('styles')
<script src="{{ asset('js/password.js')}}"></script>
<script src="{{ asset('js/userDatos.js')}}"></script>
<link rel="stylesheet" href="{{ asset('css/userDatos.css') }}">
@endsection
@section('content')
<div class="d-flex justify-content-center">
    <form method="POST" id="actualizarUserForm" action="{{ route('editar.cuenta', [$usuario->id]) }}"
        class="d-flex flex-column align-items-center text-center mt-2 col-lg-5 col-md-7 col-10"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="d-flex justify-content-center mt-4">
            <div class="text-center col-lg-9 col-10 profile-images">
                @if($usuario->imagen == null)
                <label for="fileupload"><img src="{{ URL('assets/img/user/perfil.jpg')}}" class="img-thumbnail w-100"
                        id="upload-img"></img></label>
                        <input type="file" name="file" id="fileupload" accept="image/*">
                @else
                <label for="fileupload"><img src="{{ URL($usuario->imagen)}}" class="img-thumbnail w-100"
                        id="upload-img"></img></label>
                        <input type="file" name="file" id="fileupload" accept="image/*">
                @endif
            </div>
        </div>
        <div class="row">
            <div class="form-floating mt-2">
                <input type="text" class="@error('nombre') is-invalid @enderror" name="nombre"
                    placeholder="@lang('messages.Name')" value="{{$usuario->nombre}}">
                @error('nombre')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-floating mt-2">
                <input type="text" name="apellido" placeholder="@lang('messages.Last name')"
                    value="{{$usuario->apellido}}">
                @error('apellido')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-floating mt-2 position-relative">
                <input type="password" class="@error('password') is-invalid @enderror" name="password"
                    placeholder="@lang('messages.Password')" id="registerPass">
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
            <div class="form-floating mt-2">
                <input type="password" class="@error('password2') is-invalid @enderror" name="password2"
                    placeholder="@lang('messages.RepeatPassword')" id="registerPass2">
                <span class="bi bi-eye-fill ojoPassword"></span>
                @error('password2')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div id="pass2Div"></div>
        <button type="submit" class="btn btn-success mt-2">Actualizar Datos</button>
    </form>
</div>
@endsection