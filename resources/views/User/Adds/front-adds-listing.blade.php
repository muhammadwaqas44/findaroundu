@extends('layout.app')
@section('title','Ad Listing')
@section('content')
    <header class="header-container">
        @include('layout-user.header')
        @include('layout-user.search-header-adds')
    </header>

    <div class="body-container gray-bg">
        <div class="custom-container">

            @include('layout-user.ads-category')

            <div class="listing2-main">
                <div class="row">
                    <div class="col-2">
                        <div class="cat-main-div">
                            <ul class="cat-main-ul">
                                {!! \App\Helpers\SetupsHelper::getSideBarCate(app('request')->input('category_id'),'ads') !!}
                            </ul>
                        </div>
                    </div>
                    <div class="col-10" id="add-data">

                    </div>
                </div>
            </div>

            <div class="map-div-main">
                <div class="iframe-div">
                    <div id="map"></div>
                </div>

            </div>

        </div>
    </div>

    <script>
        $('.show-map').click(function (e) {
            alert('123');
            $('.map-div-main, .body-container').toggleClass('map-rapper');
        });

    </script>

    @include('User.Adds.Partials.front-add-map-js-partial')

@endsection