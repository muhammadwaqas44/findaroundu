@extends('layout-agent.app')
@section('title','Plan Detail')

@section('content')
    <div class="body-container">
        @include('Agent.Customer.partials.all-user-menu-partial')
        @include('Agent.Customer.partials.user-detail-partial')
    </div>
    <style>.body {
            background-color: #fff !important;
        }</style>
@endsection
