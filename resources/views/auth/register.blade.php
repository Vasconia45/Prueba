<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel</title>
    <link rel="icon" href="{{ URL('/assets/img/logo.ico') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <!--CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    @foreach (['danger','warning','success','info'] as $msg)
    @if (Session::has('alert-' . $msg))
    <div class="alert alert-{{$msg}} alert-dismissible fade show" role="alert">
        {{Session::get('alert-' . $msg)}}
        <button id="alertBtn" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @endforeach
    <div class="container" id="main">
        <!--Bloque de formularios-->
        <div class="d-flex flex-lg-row flex-md-row flex-column position-absolute top-0 start-0 w-100 h-100">
            <!--Formulario de inicio-->
            <div class="sign-in col-lg-6 col-md-6 col-12">
                <form method="POST" id="formularioLogin" action="{{ route('login') }}"
                    class="d-flex justify-content-center flex-column align-items-center text-center h-100">
                    @csrf
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img style=height:75px src="{{ URL('assets/img/logo.png') }}">
                    </a>
                    <h1>@lang('messages.log in')</h1>
                    <div class="social-container">
                        <a href="#" class="social"><i class="bi bi-google"></i></a>
                        <a href="#" class="social"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="social"><i class="bi bi-facebook"></i></a>
                    </div>
                    <div class="row">
                        <div class="">
                            <input type="email" class="@error('email') is-invalid @enderror" name="email"
                                placeholder="@lang('messages.Email')" value="{{ old('email') }}" id="loginEmail"
                                autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mt-2 position-relative">
                            <input type="password" class="reset @error('password') is-invalid @enderror" name="password"
                                placeholder="@lang('messages.Password')" value="{{ old('password') }}"
                                id="loginPassword">
                            <span class="bi bi-eye-fill ojoPassword"></span>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <a href="{{ route('password.request') }}">@lang('messages.ForgotPassword')</a>
                    <button type="submit">@lang('messages.log')</button>
                </form>
            </div>
            <!--Formulario de registro-->
            <div class="sign-up col-lg-6 col-md-6 col-12">
                <form method="POST" id="formularioRegister" action="{{ route('register') }}"
                    class="d-flex justify-content-center flex-column align-items-center text-center h-100">
                    @csrf
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img style=height:75px src="{{ URL('assets/img/logo.png') }}">
                    </a>
                    <h1>@lang('messages.Register')</h1>
                    <div class="social-container">
                        <a href="#" class="social"><i class="bi bi-google"></i></a>
                        <a href="#" class="social"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="social"><i class="bi bi-facebook"></i></a>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="text" class="@error('nombre') is-invalid @enderror" name="nombre"
                                placeholder="@lang('messages.Name')" value="{{ old('nombre') }}">
                            @error('nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <input type="text" class="@error('apellido') is-invalid @enderror" name="apellido"
                                placeholder="@lang('messages.Last name')" value="{{ old('apellido') }}">
                            @error('apellido')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <input type="email" class="@error('email') is-invalid @enderror" name="email"
                                placeholder="@lang('messages.Email')" value="{{ old('email')}}" id="regEmail">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mt-2 position-relative">
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
                        <div class="mt-2 position-relative">
                            <input type="password" class="@error('password2') is-invalid @enderror" name="password2"
                                placeholder="@lang('messages.RepeatPassword')" id="registerPass2">
                            <div id="pass2Div"></div>
                            <span class="bi bi-eye-fill ojoPassword"></span>
                            @error('password2')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit">@lang('messages.RegisterBtn')</button>
                </form>
            </div>
        </div>
        <!--Bloque de botones-->
        <div class="overlay-container col-lg-6 col-md-6 col-12">
            <div class="overlay">
                <div class="overlay-left d-flex align-items-center justify-content-center position-absolute h-100 w-50">
                    <button id="signIn">@lang('messages.logBtn')</button>
                </div>
                <div
                    class="overlay-right d-flex align-items-center justify-content-center position-absolute h-100 w-50 end-0">
                    <button id="signUp">@lang('messages.RegisterBtn')</button>
                </div>
            </div>
        </div>
    </div>
    <!--JS-->
    <script src="{{asset('jquery-3.6.0.js')}}"></script>
    <script src="{{ asset('js/login.js')}}"></script>
    <script src="{{ asset('js/password.js')}}"></script>
</body>
</html>