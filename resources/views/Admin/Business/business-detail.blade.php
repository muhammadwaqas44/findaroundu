@extends('layout-admin.app')
@section('title','Business Detail')

@section('content')
    <div class="body-container">
        @include('admin.Business.Partials.all-business-menu-partial')
        @include('admin.Business.Partials.business-detail-partial')
    </div>
    <style>.body {
            background-color: #fff !important;
        }</style>
@endsection
