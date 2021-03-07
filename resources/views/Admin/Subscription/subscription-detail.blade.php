@extends('layout-admin.app')
@section('title','Subscription Detail | '.$data['subscription_detail']->name)

@section('content')

    <div class="body-container">
    @include('admin.Subscription.Partials.subscription-detail-menu-partial')
    @include('admin.Subscription.Partials.subscription-detail-partial')
    </div>
@endsection
