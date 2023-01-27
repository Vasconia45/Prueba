@extends('layouts.app')
@section('content')
    <div class="d-flex flex-center position-ref full-height justify-content-center">
        <div class="col-11 content p-2 text-center">
            <h1 class="p-2 text-uppercase">@lang('messages.ListOfProducts')</h1>
            <table class="table table-bordered">
                <thead>
                    <th>@lang('messages.Name')</th>
                    <th>@lang('messages.Expiration date')</th>
                    <th>@lang('messages.Prize')</th>
                    <th>@lang('messages.Description')</th>
                    <th>@lang('messages.Stock')</th>
                    <th>@lang('messages.Calories')</th>
                    <th>@lang("messages.Weight")</th>
                    <th>@lang("messages.Hydrates")</th>
                    <th>@lang("messages.Sugars")</th>
                    <th>@lang("messages.Proteins")</th>
                    <th>@lang("messages.Salt")</th>
                    <th>@lang("messages.Ingredients")</th>
                    <th>@lang("messages.Source")</th>
                    <th>@lang("messages.Delete")</th>
                </thead>
                <tbody>
                    @each('partials.products',$productos,'producto','partials.empty')
                </tbody>
            </table>
        </div>
    </div>
@endsection