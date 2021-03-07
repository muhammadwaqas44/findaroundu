{{--@extends('layouts.user.app')--}}
@extends('layout-admin.app')
@section('title','Add New Addon')

@section('content')

    <div class="body-container">
        @include('admin.Subscribers.Addons.Partials.new-addon-menu-partial')
        @include('admin.Subscribers.Addons.Partials.new-addon-form-partial')
    </div>



    <style>.body{background-color: #fff !important;}</style>
@endsection
