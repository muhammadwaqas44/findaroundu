@extends('MainSite-layouts.main-site-app')
@section('title','Add New Subscriber')

@section('content')


    @include('MainSite.Subscribers..Partials.customer-detail-menu-partial')
    @include('MainSite.Subscribers.Partials.customer-detail-partial')
    @include('MainSite.Popups.Customer.auto-collection-popup')
    <style>.body{background-color: #fff !important;}</style>
@endsection
