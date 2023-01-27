@extends('layouts.app')
@section('styles')
<script src="{{ asset('js/apivuelo.js')}}"></script>
<link rel="stylesheet" href="{{ asset('css/userDatos.css') }}">
@endsection
@section('content')
<div class="mt-4 d-flex flex-column text-center align-items-center">
    <div class="row">
        <div class="col-10">
            <h1>@lang('messages.Create flight')</h1>
        </div>
        <div class="col-2">
            <!--Modal tiempo-->
            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal"
                style="background:#cdb46c;">
                <i class="bi bi-cloud-haze2"></i>
            </button>
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
        </div>
    </div>
    <form method="POST" action="{{ route('Admin_crear_vuelo') }}"
        class="d-flex flex-column align-items-center mt-2 col-lg-5 col-md-7 col-10">
        @csrf
        <div class="row col-7">
            <div class="text-start">
                <label for="aeropuerto_ori" class="col-form-label text-md-end">@lang('messages.Originairport') :</label>
            </div>
            <div>
                <select class="form-select @error('aeropuerto_ori') is-invalid @enderror" name="aeropuerto_ori"
                    id="aeropuerto_ori">
                    @foreach ($aeropuertos as $aeropuerto)
                    <option value="{{$aeropuerto->nombre}}">{{$aeropuerto->nombre}}</option>
                    @endforeach
                </select>
                @error('aeropuerto_ori')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row col-7">
            <div class="text-start">
                <label for="aeropuerto_des" class="col-form-label text-md-end">@lang("messages.Destinationairport")
                    :</label>
            </div>
            <div>
                <select class="form-select @error('aeropuerto_des') is-invalid @enderror" name="aeropuerto_des"
                    id="aeropuerto_des">
                    @foreach ($aeropuertos as $aeropuerto)
                    <option value="{{$aeropuerto->nombre}}">{{$aeropuerto->nombre}}</option>
                    @endforeach
                </select>
                @error('aeropuerto_des')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row col-8">
            <div class="form-floating mt-2">
                <input id="cantidad_pasajeros" class="@error('cantidad_pasajeros') is-invalid @enderror" type="text"
                    name="cantidad_pasajeros" placeholder="@lang('messages.NumberOfPassengers')"
                    value="{{ old('cantidad_pasajeros') }}">
                @error('cantidad_pasajeros')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row col-8">
            <div class="form-floating mt-2">
                <input id="compañia" class="@error('compañia') is-invalid @enderror" type="text" name="compañia"
                    placeholder="@lang('messages.Company')" value="{{ old('compañia') }}">
                @error('compañia')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row col-8">
            <div class="form-floating mt-2">
                <input id="fecha" class="@error('fecha') is-invalid @enderror" type="date" name="fecha"
                    placeholder="" value="{{ old('fecha') }}">
                @error('fecha')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row col-8">
            <div class="form-floating mt-2">
                <input id="precio" class="@error('precio') is-invalid @enderror" type="number" name="precio"
                    placeholder="@lang('messages.Prize')" value="{{ old('precio') }}">
                @error('precio')
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