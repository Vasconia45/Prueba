<!Doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="shortcut icon" href="{{ URL('/assets/img/logo.ico') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!-- Scripts -->
    <script src="{{asset('jquery-3.6.0.js')}}"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @yield('styles')
</head>
<body>
    <div class="fixe-top" id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background:#e1e3e1;">
            <div class="container">
                @if(auth()->user())
                @if(auth()->user()->role_id)
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <img style=height:75px src="{{ URL('assets/img/logo.png') }}">
                </a>
                @endif
                @else
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img style=height:75px src="{{ URL('assets/img/logo.png') }}">
                </a>
                @endif
                @yield('menu')
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @if(auth()->user())
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->nombre }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                    @lang('messages.Log out')
                                </a>
                                @if (Auth()->user()->role_id == 2)
                                    <a class="dropdown-item" href="{{ route('mis_vuelos') }}">
                                        Mi Vuelo
                                    </a>
                                @endif
                        @if(auth()->user()->role_id == 2)
                        <a class="dropdown-item" href="{{ route('modificar.cuenta') }}">
                            @lang('messages.Settings')
                        </a>
                        @endif
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        <div class="btn-group">
                            <ol class="breadcrumb m-2" style="background-color:#0000;">
                                <li class="breadcrumb-item"><a style=color:grey;text-decoration:none;
                                        href="{{ url('locale/es') }}">ES</a></li>
                                <li class="breadcrumb-item"><a style=color:grey;text-decoration:none;
                                        href="{{ url('locale/eus') }}">EU</a></li>
                                <li class="breadcrumb-item"><a style=color:grey;text-decoration:none;
                                        href="{{ url('locale/en') }}">EN</a></li>
                            </ol>
                        </div>
                        @if (auth()->user()->role_id == 2)
                        <div>
                            <li class="nav-item">
                                <button type="button" class="btn position-relative" style="background-color:#CCB26B;">
                                    <a style="color:black" href="{{route('productos_mostrar_pedido')}}"><i id="carrito" class="bi bi-cart"></i></a>
                                </button>
                            </li>
                        </div>
                        @endif
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}"><i
                                    class="fa-solid fa-user-plus fawesome"></i></a>
                        </li>
                        <div class="btn-group">
                            <ol class="breadcrumb m-2" style="background-color:#0000;">
                                <li class="breadcrumb-item fawesome"><a href="{{ url('locale/es') }}">ES</a></li>
                                <li class="breadcrumb-item fawesome"><a href="{{ url('locale/eus') }}">EU</a></li>
                                <li class="breadcrumb-item fawesome"><a href="{{ url('locale/en') }}">EN</a></li>
                            </ol>
                        </div>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <main class="">
            @yield('content')
        </main>
    </div>
</body>
</html>