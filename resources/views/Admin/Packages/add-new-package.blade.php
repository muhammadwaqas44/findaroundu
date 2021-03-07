@extends('layout-admin.app')
@section('title','Add New Package')

@section('content')
    <div class="body-container">
        @include('Admin.Packages.Partials.allpackages-menu-partial')
        @include('Admin.Packages.Partials.new-package-form-partial')

    </div>
    <style>.body {
            background-color: #fff !important;
        }</style>
@endsection
