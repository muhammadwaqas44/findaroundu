@extends('layout-user.app')
@section('title','Plan Detail')

@section('content')
    <div class="body-container">
        @include('User.Adds.Partials.all-adds-menu-partial')
        @include('User.Adds.Partials.adds-detail-partial')
    </div>
    <style>.body {
            background-color: #fff !important;
        }</style>
@endsection
