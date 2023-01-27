@extends('layouts.app')

@section('content')
    <script src="{{ asset('js/apivuelo.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('css/userDatos.css') }}">
    <div class="p-5">
        <h1 class="text-align-center">@lang('messages.Lista_vuelos')</h1>
         <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal"
                style="background:#cdb46c;">
                
                <i class="bi bi-cloud-haze2"></i>&nbsp;&nbsp;Tiempo 
        </button>
        <div class="row">
            @foreach ($vuelos as $vuelo)
                <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 mt-3">
                    <div class="card" style="width: 100%;">
                        <img class="card-img-top p-2" width="90%" height="250px" src="{{ URL('assets/img/vuelos/' . $vuelo->aeropuerto_origen . '.jpg') }}"
                            alt="Error en la foto">
                        <div class="card-body">
                            <div>
                                <p>@lang('messages.Origen'): {{ $vuelo->aeropuerto_origen }}</p>
                                <p>@lang('messages.Destino'): {{ $vuelo->aeropuerto_destino }}</p>
                                <p>@lang('messages.Cantidad_p'): {{ $vuelo->cantidad_pasajeros }}</p>
                                <p>@lang('messages.Comp'): {{ $vuelo->compañia }}</p>
                                <p>@lang('messages.fecha'): {{ $vuelo->fecha }}</p>
                                <p>@lang('messages.Precio'): {{ $vuelo->precio }}€</p>
                                
                                <div class="d-flex justify-content-center">
                                    <div class="row ">
                                    
                                </div>                                
                                <form method="post" action="{{ route('registrarse_en_vuelo', [$vuelo->id]) }}" class="col-5">
                                    @csrf
                                @method("put")
                                <div >
                                    <input type="submit" class="btn" name="reserva" style="background-color: #CCB26B;" value="@lang('messages.Reservar')">
                                </div>

                                
                                </form>


                                <form method="post" action="{{ route('cancelarse_en_vuelo', [$vuelo->id]) }}" class="col-5">
                                    @csrf
                                @method("put")
                                <div >
                                    <input type="submit" class="btn" name="reserva" style="background-color: #d12e19;" value="@lang('messages.C_reserva')">
                                </div>

                                </form> </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">@lang('messages.Weather')</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-body">
                            <div>
                                <div class="col-6 mb-5">
                                <select class="form-select" name="pais" id="pais" onchange="cargarTiempo()">
                                    <option>@lang('messages.Select location')</option>
                                    <option id="Spain" value="Spain">Spain</option>
                                    <option id="England" value="England">England</option>
                                    <option id="America" value="America">America</option>
                                    <option id="Qatar" value="Qatar">Qatar</option>
                                    <option id="Moscow" value="Moscow">Moscow</option>
                                    <option id="Khazan" value="Khazan">Khazan</option>
                                    <option id="Bilbao" value="Bilbao">Bilbao</option>
                                    <option id="Euskadi" value="Euskadi">Euskadi</option>
                                    <option id="Kyoto" value="Kyoto">Kyoto</option>
                                    <option id="Tokyo" value="Tokyo">Tokyo</option>
                                    <option id="Canada" value="Canada">Canada</option>
                                    <option id="China" value="China">China</option>
                                    <option id="Brasil" value="Brasil">Brasil</option>
                                    <option id="Camboya" value="Camboya">Camboya</option>
                                    <option id="Norway" value="Norway">Norway</option>
                                    <!--<option id="Austria" value="Austria">Austria</option>-->
                                </select>
                                </div>
                                <label>@lang('messages.Temperature'): </label>
                                <input type="text" class="form-control" readonly id="temp" placeholder="">
                                <label>@lang('messages.Wind'): </label>
                                <input type="text" class="form-control" readonly id="viento" placeholder="">
                                <label>@lang('messages.Weather condition'):</label>
                                <input type="text" class="form-control" readonly id="condicion" placeholder="">
                                <img id="im">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <script>
        $(document).ready(function() {
            $('.toast').toast('show');
        });
    </script>
@endsection
