@extends('layout-admin.app')
@section('title','Module Detail | '.$data['module_detail']->name)

@section('content')
    @include('admin.Module.Partials.module-detail-menu-partial')
    <div class="body-container">
    @include('admin.Module.Partials.module-detail-partial')
    </div>
    {{--@include('Popups.Customer.auto-collection-header-popup')--}}
    <style>.body{background-color: #fff !important;}</style>
@endsection
