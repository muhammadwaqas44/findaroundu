@extends('layout.app')
@section('title','Job Listing')
@section('content')

    <header class="header-container">
        @include('layout-user.header')
        @include('User.Jobs.Partials.filter')
    </header>


    <div class="body-container">
        <div class="professionals-page-main">
            <div class="container-fluid">
                <div class="row">

                    @include('User.Jobs.Partials.sidebar')

                    @include('User.Jobs.Partials.middle-section')

                    @include('User.Jobs.Partials.left-sidebar')

                </div>

            </div>

            <div class="map-div-main">
                <div class="iframe-div">
                    <div id="map-id"></div>
                </div>
            </div>

        </div>
    </div>


    <script>
        $('.show-map').click(function (e) {
            $('.map-div-main, .body-container').toggleClass('map-rapper');
        });

    </script>


    @include('User.Jobs.Partials.front-job-map-js-partial')


@endsection







