@extends('layout-user.app')
@section('user-portal-heading','My Dashboard')
@section('content')


    @include('layout-user.user-portal-heading')

    <div class="body-container">
        @include('layout-user.header')
        <div class="dashboard-main">
            @include('layout-user.sidebar')
            <div class="dashboard-right-main">
                <span class="Your-Statistics">Your Statistics</span>
                <ul class="statistics-ul">
                    <li>
                        <span class="tv-span"><i class="fas fa-tv"></i></span>
                        <span class="listing-focus"><a href="{{route('user.all-services',[$flag = 'posted_by=me'])}}">Total Services</a></span>
                        <p class="Calculates-pera">Calculates your all your services.</p>
                        <span class="calculation-price"><a
                                    href="{{route('user.all-services',[$flag = 'posted_by=me'])}}">{{$data['services']}}</a></span>
                    </li>
                    <li>
                        <span class="tv-span"><i class="fas fa-tv"></i></span>
                        <span class="listing-focus"><a href="{{route('user.all-business',[$flag = 'posted_by=me'])}}">Total Businesses</a></span>
                        <p class="Calculates-pera">Calculates all your businesses</p>
                        <span class="calculation-price"><a
                                    href="{{route('user.all-business',[$flag = 'posted_by=me'])}}">{{$data['businesses']}}</a></span>
                    </li>
                    <li>
                        <span class="tv-span"><i class="fas fa-tv"></i></span>
                        <span class="listing-focus"><a href="{{route('user.front-adds',[$flag = 'posted_by=me'])}}">Total Adds</a></span>
                        <p class="Calculates-pera">Calculates your all your adds.</p>
                        <span class="calculation-price"><a
                                    href="{{route('user.front-adds',[$flag = 'posted_by=me'])}}">{{$data['adds']}}</a></span>
                    </li>

                </ul>
                <div class="calendr-main">
                    <img src="{{asset('project-assets/images/calendr.PNG')}}" alt="no img">
                </div>
            </div>
        </div>

    </div>



    @include('layout-user.js')
@endsection