@extends('MainSite-layouts.main-site-app')
@section('title','Add Billig Address')

@section('content')

    @include('MainSite.Subscribers.Billing.Partials.customer-add-billing-menu-partial')
    @include('MainSite.Subscribers.Billing.Partials.customer-add-billing-form-partial')
    <style>.body{background-color: #fff !important;}</style>
@endsection
