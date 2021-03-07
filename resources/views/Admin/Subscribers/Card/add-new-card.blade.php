@extends('MainSite-layouts.main-site-app')
@section('title','Add New Card')



@section('content')

    <script src="{{asset('MainSite/Assets/js/card-js.min.js')}}"></script>
    <link href="{{asset('MainSite/Assets/css/select2.min.css')}} " type="text/css" rel="stylesheet">

    @include('MainSite.Subscribers.Card.Partials.new-card-menu-partial')
    @include('MainSite.Subscribers.Card.Partials.card-form-partial')

    <style>.body{background-color: #fff !important;}</style>

@endsection
