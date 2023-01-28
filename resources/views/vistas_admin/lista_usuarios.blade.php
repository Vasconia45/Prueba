@extends('layouts.app')
@section('content')
<div class="d-flex flex-center position-ref full-height justify-content-center">
    <div class="col-lg-10 col-md-11 content p-2 text-center">
        <h1 class="p-2 text-uppercase">@lang('messages.ListOfUsers')</h1>
        <table class="table table-bordered">
            <thead>
                <th>@lang('messages.Name')</th>
                <th>@lang('messages.Last name')</th>
                <th>@lang('messages.Email')</th>
                <th>@lang('messages.Role')</th>
                <th>@lang('messages.Ascend')</th>
                <th>@lang('messages.Degrade')</th>
                <th>@lang('messages.Edit')</th>
                <th>@lang('messages.Delete')</th>
            </thead>
            <tbody>
                @each('partials.users',$usuarios,'usuario','partials.empty')
            </tbody>
        </table>
    </div>
</div>
@endsection