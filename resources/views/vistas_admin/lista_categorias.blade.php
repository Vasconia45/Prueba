@extends('layouts.app')
@section('content')
    <div class="d-flex flex-center position-ref full-height justify-content-center">
        <div class="col-3 content p-2 text-center">
            <h1 class="p-2 text-uppercase">@lang("messages.ListOfCategories")</h1>
            <table class="table table-bordered">
                <thead>
                    <th>@lang('messages.Name')</th>
                    <th>@lang('messages.Delete')</th>
                </thead>
                <tbody>
                    @each('partials.categories',$categorias,'categoria','partials.empty')
                </tbody>
            </table>
        </div>
    </div>
@endsection