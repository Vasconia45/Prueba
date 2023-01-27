@extends('layouts.app')

@section('content')
    <div class="p-5">
        <h1>@lang('messages.AquiTuV')</h1>
        @if ($user->vuelo == null)
            <h3>@lang('messages.NoVuelos')</h3>
        @else
            <div class="d-flex col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 mt-3 justify-content-center">


                <div class="card" style="width: 100%;">
                    <img class="card-img-top p-2" width="90%" height="250px"
                        src="{{ URL('assets/img/vuelos/' . $user->vuelo->aeropuerto_origen . '.jpg') }}"
                        alt="Error en la foto">
                    <div class="card-body">
                        <div>
                            <p>@lang('messages.Origen'): {{ $user->vuelo->aeropuerto_origen }}</p>
                            <p>@lang('messages.Destino'): {{ $user->vuelo->aeropuerto_destino }}</p>
                            <p>@lang('messages.Cantidad_p'): {{ $user->vuelo->cantidad_pasajeros }}</p>
                            <p>@lang('messages.Comp'): {{ $user->vuelo->compañia }}</p>
                            <p>@lang('messages.fecha'): {{ $user->vuelo->fecha }}</p>
                            <p>@lang('messages.Precio'): {{ $user->vuelo->precio }}€</p>

                            <div class="d-flex justify-content-center">
                                <div class="row ">

                                </div>



                                <form method="post" action="{{ route('cancelarse_en_vuelo', [$user->vuelo->id]) }}">
                                    @csrf
                                    @method('put')
                                    <div>
                                        <input type="submit" class="btn" name="reserva"
                                            style="background-color: #d12e19;" value="Cancelar Reserva">
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    @endif
@endsection
