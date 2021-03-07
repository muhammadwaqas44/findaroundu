@extends('layout-user.app')
@section('title','Plan Detail')

@section('content')
    <div class="body-container">
        @include('User.Services.Partials.all-service-menu-partial')
        @include('User.Services.Partials.service-detail-partial')
    </div>
    <style>.body {
            background-color: #fff !important;
        }</style>
@endsection
