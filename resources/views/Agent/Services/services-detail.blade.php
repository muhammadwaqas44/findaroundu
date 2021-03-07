@extends('layout-agent.app')
@section('title','Plan Detail')

@section('content')
    <div class="body-container">
        @include('Agent.Services.Partials.all-service-menu-partial')
        @include('Agent.Services.Partials.service-detail-partial')
    </div>
    <style>.body {
            background-color: #fff !important;
        }</style>
@endsection
