@extends('layout-agent.app')
@section('title','Business Detail')

@section('content')
    <div class="body-container">
        @include('Agent.Business.Partials.all-business-menu-partial')
        @include('Agent.Business.Partials.business-detail-partial')
    </div>
    <style>.body {
            background-color: #fff !important;
        }</style>
@endsection
