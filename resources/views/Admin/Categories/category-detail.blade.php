@extends('layout-admin.app')
@section('title','Category Detail')

@section('content')
    <div class="body-container">
        @include('Admin.Categories.Partials.all-categories-menu-partial')
        @include('Admin.Categories.Partials.category-detail-partial')
    </div>
    <style>.body {
            background-color: #fff !important;
        }</style>
@endsection
