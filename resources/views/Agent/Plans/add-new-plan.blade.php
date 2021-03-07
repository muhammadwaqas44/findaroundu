@extends('layout-admin.app')
@section('title','Add New Plan')

@section('content')




    <div class="body-container">
    @include('admin.Plans.Partials.allplans-menu-partial')
    @include('admin.Plans.Partials.new-plan-form-partial')
    </div>

<style>.body{background-color: #fff !important;}</style>
@endsection
