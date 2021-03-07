@extends('layout-admin.app')
@section('title','Addon Detail | '.$data['addon_detail']->name)

@section('content')
    <div class="body-container">


    @include('admin.Subscribers.Addons.Partials.addon-detail-menu-partial')
        @if(Session::has('error'))

            <p class="alert alert-danger">{{ Session::get('error') }}</p>

        @endif
    @include('admin.Subscribers.Addons.Partials.addon-detail-partial')
    </div>
    {{--@include('Popups.Customer.auto-collection-header-popup')--}}
@endsection
