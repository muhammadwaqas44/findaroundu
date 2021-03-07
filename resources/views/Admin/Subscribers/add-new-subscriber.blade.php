@extends('MainSite-layouts.main-site-app')
@section('title','Add New Subscriber')

@section('content')


    @include('MainSite.Subscribers.Partials.new-customer-menu-partial')
    @include('MainSite.Subscribers.Partials.new-customer-form-partial')

    <style>.body{background-color: #fff !important;}</style>

@endsection
