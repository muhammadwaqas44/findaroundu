@extends('layout-agent.app')
@section('title','Plan Detail')

@section('content')
    <div class="body-container">
        @include('Agent.Adds.Partials.all-adds-menu-partial')
        @include('Agent.Adds.Partials.adds-detail-partial')
    </div>
    <style>.body {
            background-color: #fff !important;
        }</style>
@endsection
