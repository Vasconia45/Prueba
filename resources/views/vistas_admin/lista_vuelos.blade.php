@extends('layouts.app')
@section('content')
    <div class="d-flex flex-center position-ref full-height justify-content-center">
        <div class="col-lg-10 content p-2 text-center">
            <h1 class="p-2 text-uppercase">@lang("messages.ListOfFlights")</h1>
            <table class="table table-bordered">
                <thead>
                    <th>@lang("messages.Originairport")</th>
                    <th>@lang("messages.Destinationairport")</th>
                    <th>@lang("messages.NumberOfPassengers")</th>
                    <th>@lang("messages.Company")</th>
                    <th>@lang("messages.Date")</th>
                    <th>@lang("messages.Prize")</th>
                    <th>@lang("messages.Delete")</th>
                </thead>
                <tbody>
                    @each('partials.flights',$vuelos,'vuelo','partials.empty')
                </tbody>
            </table>
        </div>
    </div>
@endsection