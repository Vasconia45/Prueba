@extends('layouts.app')
@section('content')
<div class="d-flex flex-center position-ref full-height justify-content-center">
    <div class="col-lg-10 col-md-11 content p-2 text-center">
        <h1 class="p-2 text-uppercase">@lang('messages.ListOfUsers')</h1>
        <table class="table table-bordered">
            <thead>
                <td>ID</td>
                <td>@lang('messages.Name')</td>
                <td>@lang('messages.Last name')</td>
                <td>@lang('messages.Email')</td>
                <td>@lang('messages.Role')</td>
                <td>@lang('messages.Retrieve')</td>
                <td>@lang('messages.Delete')</td>
            </thead>
            <tbody>
                @each('partials.users_retrieve',$usuarios,'usuario','partials.empty')
            </tbody>
        </table>
    </div>
</div>
@endsection