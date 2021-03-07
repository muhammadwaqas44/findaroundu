@extends('layouts.user.app')
@section('title','Add New Customer')

@section('content')


    @include('User.Customers.Partials.new-customer-menu-partial')
    @include('User.Customers.Partials.edit-customer-form-partial')



@endsection
