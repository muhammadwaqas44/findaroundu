@extends('layout-admin.app')
@section('title','User Detail')

@section('content')


    <div class="body-container">
        @include('Admin.Customer.partials.all-user-menu-partial')
        {{--@include('admin.Customer.partials.user-detail-partial')--}}
        @include('Admin.Customer.partials.user-detail-partial2')

    </div>




    <style>
        .body {
            background-color: #fff !important;
        }
    </style>

@endsection
