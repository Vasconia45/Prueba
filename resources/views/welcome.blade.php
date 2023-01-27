@extends('layouts.app')
@section('styles')
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <style type="text/css">
        .fawesome:hover {
            color: #CDB46C;
        }
    </style>
@endsection
@section('menu')
    @if (auth()->user())
        <ul class="navbar-nav col-lg-2 col-md-3 col-4 flex-row justify-content-around">
            <li><a href="#categorias" style="text-decoration: none"
                    class="mr-2 text-sm text-gray-700 dark:text-gray-500 underline">@lang('messages.Categories')</a></li>
            <li><a href="#marcas" style="text-decoration: none"
                    class="mr-2 text-sm text-gray-700 dark:text-gray-500 underline">@lang('messages.brands')</a></li>
            <li><a href="{{ route('productos_mostrar_lista_productos') }}" style="text-decoration: none"
                    class="mr-2 text-sm text-gray-700 dark:text-gray-500 underline">@lang('messages.List product')</a></li>
            <li><a href="{{ route('vuelos_mostrar_lista_vuelos') }}" style="text-decoration: none"
                    class="mr-2 text-sm text-gray-700 dark:text-gray-500 underline">@lang('messages.List flight')</a></li>
        </ul>
    @else
        <ul class="navbar-nav col-lg-2 col-md-3 col-4 flex-row justify-content-around">
            <li><a href="#categorias" style="text-decoration: none"
                    class="mr-2 text-sm text-gray-700 dark:text-gray-500 underline">@lang('messages.Categories')</a></li>
            <li><a href="#marcas" style="text-decoration: none"
                    class="mr-2 text-sm text-gray-700 dark:text-gray-500 underline">@lang('messages.brands')</a></li>
        </ul>
    @endif
@endsection
@section('content')
    <div id="categorias">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <h2 class="text-center mt-5" style="color: #CCB26B">@lang('messages.Categories')</h2>
                <hr>
                @foreach ($categorias as $categoria)
                    @if ($loop->first)
                        <div class="carousel-item active">
                            <div class="cards-wrapper d-flex justify-content-around">
                                <div class="cards">
                                    <div class="face front">
                                        <img src="{{ URL('assets/img/' . $categoria->nombre . '.jpg') }}"
                                            class="w-100 h-100" valt="" />
                                    </div>
                                    <div class="face back">
                                        @if (auth()->user())
                                            <a href="#">
                                                <h1 class="mt-3 texto">{{ $categoria->nombre }}</h1>
                                            </a>
                                        @else
                                            <a href="{{ route('register') }}">
                                                <h1 class="mt-3 texto">{{ $categoria->nombre }}</h1>
                                            </a>
                                        @endif
                                        <h4>@lang('messages.Related products'):</h4><br>
                                        @foreach ($categoria->productos as $producto)
                                            @if (auth()->user())
                                                <a href="#">
                                                    <p class="text-white">{{ $producto->nombre }}</p>
                                                </a>
                                            @else
                                                <a href="{{ route('register') }}">
                                                    <p class="text-white">{{ $producto->nombre }}</p>
                                                </a>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="carousel-item">
                            <div class="cards-wrapper d-flex justify-content-around">
                                <div class="cards">
                                    <div class="face front">
                                        @if (auth()->user())
                                            <a href="#"><img
                                                    src="{{ URL('assets/img/' . $categoria->nombre . '.jpg') }}"
                                                    class="w-100 h-100" valt="" /></a>
                                        @else
                                            <a href="{{ route('register') }}"><img
                                                    src="{{ URL('assets/img/' . $categoria->nombre . '.jpg') }}"
                                                    class="w-100 h-100" valt="" /></a>
                                        @endif
                                    </div>
                                    <div class="face back">
                                        @if (auth()->user())
                                            <a href="#">
                                                <h1 class="mt-3 texto">{{ $categoria->nombre }}</h1>
                                            </a>
                                        @else
                                            <a href="{{ route('register') }}">
                                                <h1 class="mt-3 texto">{{ $categoria->nombre }}</h1>
                                            </a>
                                        @endif
                                        <h4>@lang('messages.Related products'):</h4><br>
                                        @foreach ($categoria->productos as $producto)
                                            @if (auth()->user())
                                                <a href="#">
                                                    <p class="text-white">{{ $producto->nombre }}</p>
                                                </a>
                                            @else
                                                <a href="{{ route('register') }}">
                                                    <p class="text-white">{{ $producto->nombre }}</p>
                                                </a>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
    @if (!auth()->user())
        <div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;">
            <div class="toast" style="position: fixed; top: 0; right: 0;">
                <div class="toast-header">
                    <img src="{{ URL('assets/img/logo.png') }}" height="75px" class="rounded mr-2" alt="...">
                    <strong class="mr-auto">La vascongada</strong>
                    <button type="button" class="ml-2 mb-1 btn" data-bs-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body">
                    <p>Recuerda que puedes iniciar sesion para ver nuestros productos pinchando <a id="link_especial"
                            href="{{ route('register') }}">aqui.</a></p>
                </div>
            </div>
        </div>
    @endif
    <section class="page-section mt-5" id="services">
        <div class="container-fluid px-4 px-lg-5">
            <h2 class="text-center mt-5" style="color: #CCB26B">@lang('messages.We can find')</h2>
            <hr class="divider" />
            <div class="row gx-4 gx-lg-5">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i style="color: #CCB26B" class="bi bi-tags fs-1"></i></div>
                        <h3 class="h4 mb-2" style="color: #CCB26B">@lang('messages.The best deals')</h3>
                        <p class="mb-0">@lang('messages.Landing_par1')</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i style="color: #CCB26B" class="bi bi-cash fs-1"></i></div>
                        <h3 class="h4 mb-2" style="color: #CCB26B">@lang('messages.Cheap prices')</h3>
                        <p class="mb-0">@lang('messages.Landing_par2')</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i style="color: #CCB26B" class="bi bi-bar-chart-steps fs-1"></i></div>
                        <h3 class="h4 mb-2" style="color: #CCB26B">@lang('messages.Extra information')</h3>
                        <p class="mb-0">@lang('messages.Landing_par3')</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i style="color: #CCB26B" class="bi bi-cart fs-1"></i></div>
                        <h3 class="h4 mb-2" style="color: #CCB26B">@lang('messages.Novelty!!!')</h3>
                        <p class="mb-0">@lang('messages.Landing_par4')</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="mt-5" style="margin-top: 200px" id="marcas">
        <div id="carouselExampleControls2" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <h2 class="text-center mt-5" style="color: #CCB26B">@lang('messages.Categories')</h2>
                <hr>
                @foreach ($marcas as $marca)
                    @if ($loop->first)
                        <div class="carousel-item active">
                            <div class="cards-wrapper d-flex justify-content-around">
                                <div class="cards">
                                    <div class="face front">
                                        @if (auth()->user())
                                            <a href="#"><img
                                                    src="{{ URL('assets/img/' . $marca->nombre . '.jpg') }}"
                                                    class="w-100 h-100" valt="" /></a>
                                        @else
                                            <a href="{{ route('register') }}"><img
                                                    src="{{ URL('assets/img/' . $marca->nombre . '.jpg') }}"
                                                    class="w-100 h-100" valt="" /></a>
                                        @endif
                                    </div>
                                    <div class="face back">
                                        @if (auth()->user())
                                            <a href="#">
                                                <h1 class="mt-3 texto">{{ $marca->nombre }}</h1>
                                            </a>
                                        @else
                                            <a href="{{ route('register') }}">
                                                <h1 class="mt-3 texto">{{ $marca->nombre }}</h1>
                                            </a>
                                        @endif
                                        <h4>@lang('messages.Related products'):</h4><br>
                                        @foreach ($marca->productos as $producto)
                                            @if (auth()->user())
                                                <a href="#">
                                                    <p class="text-white">{{ $producto->nombre }}</p>
                                                </a>
                                            @else
                                                <a href="{{ route('register') }}">
                                                    <p class="text-white">{{ $producto->nombre }}</p>
                                                </a>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="carousel-item">
                            <div class="cards-wrapper d-flex justify-content-around">
                                <div class="cards">
                                    <div class="face front">
                                        <img src="{{ URL('assets/img/' . $marca->nombre . '.jpg') }}" class="w-100 h-100"
                                            valt="" />
                                    </div>
                                    <div class="face back">
                                        @if (auth()->user())
                                            <a href="#">
                                                <h1 class="mt-3 texto">{{ $marca->nombre }}</h1>
                                            </a>
                                        @else
                                            <a href="{{ route('register') }}">
                                                <h1 class="mt-3 texto">{{ $marca->nombre }}</h1>
                                            </a>
                                        @endif
                                        <h4>@lang('messages.Related products'):</h4><br>
                                        @foreach ($marca->productos as $producto)
                                            @if (auth()->user())
                                                <a href="#">
                                                    <p class="text-white">{{ $producto->nombre }}</p>
                                                </a>
                                            @else
                                                <a href="{{ route('register') }}">
                                                    <p class="text-white">{{ $producto->nombre }}</p>
                                                </a>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls2"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls2"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
    <footer>
        <div class="row mt-5 text-center" id='datos'>
            <div class="col-lg-3 col-md-6 col-ls-6">
                <i class="bi bi-geo-alt icon"></i>
                <div>
                    <h4 class="titulo-footer">@lang('messages.Direction')</h4>
                    <p>
                        A108 Adam Street <br>
                        Donostia - ES<br>
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-ls-6 ">
                <i class="bi bi-telephone icon"></i>
                <div>
                    <h4 class="titulo-footer">@lang('messages.Customer Support')</h4>
                    <p>
                        <strong>@lang('messages.Telephone'):</strong> +1 943 76 09 87<br>
                        <strong>@lang('messages.Email'):</strong> lvsgada@gmail.com<br>
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-ls-6">
                <i class="bi bi-clock icon"></i>
                <div>
                    <h4 class="titulo-footer">@lang('messages.Schedule')</h4>
                    <p>
                        <strong>@lang('messages.Horario_ent'):</strong> 11AM - 23PM<br>
                        @lang('messages.Horario_cer')
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-ls-6">
                <i class="bi bi-file-post"></i>
                <h4 class="titulo-footer">@lang('messages.Networks')</h4>
                <div class="social">
                    <a href="https://twitter.com/" class="twitter redes"><i class="bi bi-twitter"></i></a>
                    <a href="https://es-es.facebook.com/" class="facebook redes"><i class="bi bi-facebook"></i></a>
                    <a href="https://www.instagram.com/" class="instagram redes"><i class="bi bi-instagram"></i></a>
                    <a href="https://www.reddit.com/" class="reddit redes"><i class="bi bi-reddit"></i></a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>La Vascongada</span></strong>.
            </div>
        </div>
        </div>
        <script>
            $(document).ready(function() {
                $('.toast').toast('show');
            });
        </script>
    </footer>
@endsection
