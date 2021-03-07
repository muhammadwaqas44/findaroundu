@extends('layout-admin.app')
@section('title','Add New Settings')

@section('content')




    <div class="body-container">
        @include('Admin.Settings.Partials.add-setting-menu-partial')
        @include('Admin.Settings.Partials.new-setting-form-partial')
    </div>

    <style>.body{background-color: #fff !important;}</style>
@endsection
