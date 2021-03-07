@extends('layout-admin.app')
@section('title','Create Menues')
@section('content')

    <div class="body-container">
    @include('admin.Module.Partials.new-erp-module-partial')
    @include('admin.Module.Partials.new-module-form-partial')
    </div>
    <style>.body{background-color: #fff !important;}</style>
    <style>.right-rable-main {
            margin-top: 65px !important;
        }</style>
@endsection

