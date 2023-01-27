@extends('layouts.app')

@section('content')
    <div class="card-body">
        <form method="POST" action="{{ route('admin_lista_usuarios_modificar',[$usuario->id]) }}" id="formulario2">
            @csrf

            <div class="row mb-3 col-md-6 text-md-end">
                <h1>Modificar usuario</h1>
            </div>

            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">@lang('messages.Name')</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('nombre') is-invalid @enderror"
                        name="nombre" value="{{ $usuario->nombre }}" required autocomplete="nombre" autofocus>
                </div>
            </div>

            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">@lang('messages.Last name')</label>

                <div class="col-md-6">
                    <input id="apellido" type="text" class="form-control @error('apellido') is-invalid @enderror"
                        name="apellido" value="{{ $usuario->apellido }}" required autocomplete="apellido" autofocus>
                </div>
            </div>

            <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end">@lang('messages.Email')</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ $usuario->email }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>@lang('messages.The email has already been taken.')</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="password" class="col-md-4 col-form-label text-md-end">@lang('messages.Password')</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password">

                    <div id="pass1Div"></div>

                    <div class="ms-3">
                        <div id="progress-bar" style="height:5px;width:25%"></div>
                    </div>

                    <span id="passstrength"></span>
                </div>
            </div>

            <div class="row mb-3">
                <label for="password" class="col-md-4 col-form-label text-md-end">@lang('messages.Confirm password')</label>

                <div class="col-md-6">
                    <input id="password2" type="password" class="form-control @error('password2') is-invalid @enderror"
                        name="password2" required autocomplete="new-password">
                    <div id="pass2Div"></div>
                </div>

            </div>

            <div class="row mb-3">
                <label for="rol" class="col-md-4 col-form-label text-md-end">@lang('messages.Role')</label>

                <div class="col-md-6">
                    <select name="rol" id="rol">
                        @foreach ($roles as $rol)
                            <option value="{{$rol->id}}">{{$rol->tipo}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Modificar
                    </button>
                </div>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script>
        $("#formulario2").submit(function() {
            if ($("#password").val().length >= 1) {
                $("#pass1Div").text("");
                let div = $("#passstrength");
                if (div.text() == "Débil!" || div.text() == "Más caracteres.") {
                    return false;
                }
            }
            if ($("#password").val() != $("#password2").val()) {
                let div = $("#pass2Div");
                div.text("Las contraseñas no coinciden,porfavor revisela");
                div.css("color", "red");
                return false;
            }
            return true;
        });
        $('#password').keyup(function(e) {
            var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
            var mediumRegex = new RegExp(
                "^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$",
                "g");
            var enoughRegex = new RegExp("(?=.{6,}).*", "g");
            var div = $("#passstrength");
            var barra = $("#progress-bar");
            if (false == enoughRegex.test($(this).val())) {
                div.html('Más caracteres.');
                div.css("color", "red");
                barra.removeClass();
                barra.css("width", "10%")
                barra.addClass("bg-danger");
                return false;
            } else if (strongRegex.test($(this).val())) {
                div.html('Fuerte!');
                div.css("color", "green");
                barra.removeClass();
                barra.css("width", "90%")
                barra.addClass("bg-success");
                return false;
            } else if (mediumRegex.test($(this).val())) {
                div.html('Media!');
                div.css("color", "orange");
                barra.removeClass();
                barra.css("width", "50%")
                barra.addClass("bg-warning");
                return false;
            } else {
                div.html('Débil!');
                div.css("color", "red");
                barra.removeClass();
                barra.css("width", "25%")
                barra.addClass("bg-danger");
                return false;
            }
        });
    </script>
@endsection
