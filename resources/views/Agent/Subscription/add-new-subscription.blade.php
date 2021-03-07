@extends('MainSite-layouts.main-site-app')
@section('title','Add New Subscription')

@section('content')










    @include('MainSite.Subscription.Partials.add-subscription-menu-partial')
    @include('MainSite.Subscription.Partials.new-subscription-form-partial')
    <style>.body{background-color: #fff !important;}</style>
@endsection
