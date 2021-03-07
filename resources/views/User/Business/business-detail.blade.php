@extends('layout.app')
@section('title','Business Detail')

@section('content')
    <div class="body-container">
        @include('User.Business.Partials.all-business-menu-partial')
        @include('User.Business.Partials.business-detail-partial')
    </div>
    <style>.body {
            background-color: #fff !important;
        }</style>
@endsection
