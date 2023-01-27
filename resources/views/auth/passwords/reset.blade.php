@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Reset Password') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    <div id="pass1Div"></div>

                                    <div class="ms-3">
                                        <div id="progress-bar" style="height:5px;width:25%"></div>
                                    </div>

                                    <span id="passstrength"></span>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password2" type="password" class="form-control" name="password_confirmation"
                                        required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Reset Password') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script>
        $("#formulario1").submit(function() {
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
                "^(?=.{8,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$",
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
