@extends('layout-agent.app')
@section('title','Subscription Detail | '.$data['subscription_detail']->name)

@section('content')

    <div class="body-container">
    @include('Agent.Subscription.Partials.subscription-detail-menu-partial')
    @include('Agent.Subscription.Partials.subscription-detail-partial')
    </div>
@endsection
